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
        <a class="nav-link " href="PresentAtWork.php">Prezenta la locul de munca</a>
      </li>
      <li class="nav-item">
        <a class="nav-link " href="Vacation.php">Concedii </a>
      </li>
    </ul>
  </div>
</nav>
<br>
    <div>
        <div class="container">
            <button class="btn btn-primary my-5 ">
                <a class="text-light" href="InsertVacations.php">Add</a>
            </button>
            <table class="table">
                <thead>
                    <tr>
                      <th scope="col">Id</th>
                        <th scope="col">Nume</th>
                        <th scope="col">Prenume</th>
                        <th scope="col">Tip Concediu</th>
                        <th scope="col">Data inceput</th>
                        <th scope="col">Data sfarsit</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
    $sql = "SELECT
    c.id,
    a.nume,
    a.prenume,
    c.tip,
    c.data_inceput,
    c.data_sfarsit
    FROM
    concedii c
    INNER JOIN Angajati a ON
    a.id = c.id_angajat";
    $result=mysqli_query($connection,$sql);
    if($result){
        while ($row = mysqli_fetch_assoc($result)) {
            $user_id = $row['id'];
            $name = $row['nume'];
            $surname = $row['prenume'];
            $type = $row['tip'];
            $StartDate = $row['data_inceput'];
            $EndDate = $row['data_sfarsit'];
            echo             '<tr>
            <th scope="row">' . $user_id . '</th>
            <td>' . $name . '</td>
            <td>' . $surname . '</td>
            <td>' . $type . '</td>
            <td>' . $StartDate . '</td>
            <td>' . $EndDate . '</td>
            <td>
            </td>
           </tr>'
           ;
        }
    }
    
    ?>
    </script>
        <script src="alerts.js"></script>
                </tbody>
            </table>
        </div>
    </div>
    
</body>

</html>
