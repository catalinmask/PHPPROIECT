<?php include "ConnectDb.php";
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="styles.css">
    
    <script src="sweetalert2.all.min.js"></script>
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <title>Meniu</title>
</head>

<body>
<nav class="navbar navbar-expand-lg navbar-light bg-light">
  <a class="navbar-brand" href="#">Meniu</a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>
  <div class="collapse navbar-collapse" id="navbarNav">
    <ul class="navbar-nav">
      <li class="nav-item active">
        <a class="nav-link" href="Employees.php">Angajati</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="Delay.php">Intarzieri</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="WorkProgramme.php">Program de lucru</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="PresentAtWork.php">Prezenta la locul de munca</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="Vacation.php">Concedii </a>
      </li>
    </ul>
  </div>
</nav>
<br>
        <div class="container">
        <form action="PresentAtWork.php" method="post">
        <label for="input">Selectați o dată:</label>
        <input type="date" id="date" name="date">
        <button type="submit" id="submit" name="submit" class="btn btn-primary" value="Trimite"> Trimite </button>
        <button class="btn btn-primary my-5 ">
                <a class="text-light" href="InsertPresentAtWork.php">Add</a>
            </button>
        </form>

<br>
            <table class="table">
                <thead>
                    <tr>
                        <th scope="col">Id</th>
                        <th scope="col">Nume</th>
                        <th scope="col">Prenume</th>
                        <th scope="col">Data</th>
                        <th scope="col">Motiv Intarziere</th>
                    </tr>
                </thead>
                <tbody>
<?php

if (isset($_POST['submit'])) {

    $date = $_POST['date'];
    $sql = "SELECT a.id, a.nume, a.prenume, p.DATA, i.motiv
    FROM `Prezenta_la_locul_de_munca` p
    INNER JOIN Angajati a on a.id=p.id_angajat
    LEFT JOIN intarzieri i on i.id_angajat=a.id AND i.DATA=' $date'
    WHERE p.DATA='$date'";

    $result = mysqli_query($connection, $sql);
    if ($result) {
        while ($row = mysqli_fetch_assoc($result)) {
            $user_id = $row['id'];
            $name = $row['nume'];
            $surname = $row['prenume'];
            $date = $row['DATA'];
            $reason = $row['motiv'];
            echo '<tr>
            <th scope="row">' . $user_id . '</th>
            <td>' . $name . '</td>
            <td>' . $surname . '</td>
            <td>' . $date . '</td>
            <td>' . $reason . '</td>
            <td>
            </td>
           </tr>';
        }
    }
}
    ?>
                </tbody>
            </table>
        </div>
    </div>
    
</body>

</html>
