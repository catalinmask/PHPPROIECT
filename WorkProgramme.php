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
        <a class="nav-link" href="Employees.php">Angajati <span class="sr-only">(current)</span></a>
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
    <div>
        <div class="container">
        <form method="post">
            <button class="btn btn-primary my-5 " type="submit"  name="submit"> Cauta </button>
            <input placeholder="Numele angajatului" name="NumeAngajat">
            <button class="btn btn-primary my-5 ">
                <a class="text-light" href="InsertWorkProgramme.php">Add User</a>
            </button>
        </form>
            <table class="table">
                <thead>
                    <tr>
                        <th scope="col">Id</th>
                        <th scope="col">Nume</th>
                        <th scope="col">Prenume</th>
                        <th scope="col">Zi</th>
                        <th scope="col">Ora inceput</th>
                        <th scope="col">Ora sfarsit</th>
                        <th scope="col">Pauza de masa inceput</th>
                        <th scope="col">Pauza de masa sfarsit</th>
                    </tr>
                </thead>
                <tbody>
<?php

if (isset($_POST['submit'])) {

    $name = $_POST['NumeAngajat'];
    $sql = "SELECT
    Pl.id,
    a.Nume,
    a.Prenume,
    Pl.zi_saptamana,
    Pl.ora_inceput,
    Pl.ora_sfarsit,
    Pl.pauza_masa_inceput,
    Pl.pauza_masa_sfarsit
    FROM
    `Program_lucru` Pl
    inner join Angajati a on a.nume='$name' and a.id=Pl.id_angajat";

    $result = mysqli_query($connection, $sql);
    if (mysqli_num_rows($result) > 0) {
      while ($row = mysqli_fetch_assoc($result)) {
          $user_id = $row['id'];
          $name = $row['Nume'];
          $surname = $row['Prenume'];
          $date = $row['zi_saptamana'];
          $HourStarProgramme = $row['ora_inceput'];
          $HourFinishProgramme = $row['ora_sfarsit'];
          $HourStartBreak = $row['pauza_masa_inceput'];
          $HourFinishBreak=$row['pauza_masa_sfarsit'];
          echo '<tr>
          <th scope="row">' . $user_id . '</th>
          <td>' . $name . '</td>
          <td>' . $surname . '</td>
          <td>' . $date . '</td>
          <td>' . $HourStarProgramme . '</td>
          <td>' . $HourFinishProgramme . '</td>
          <td>' . $HourStartBreak . '</td>
          <td>' . $HourFinishBreak . '</td>
          <td>
          <button class="btn btn-primary"><a href="UpdateWorkProgramme.php?updateId='.$user_id.'&name='.$name.'" class="text-light">Update</a></button>
                  <button class="btn btn-danger"><a href="DeleteWorkProgramme.php?deleteId='.$user_id.'" class="text-light">Delete</a></button>
          </td>
         </tr>';
      }
  }  
  if (mysqli_num_rows($result) == 0) {
    echo "Nu au fost găsite înregistrări pentru numele specificat.";
}

}

?>
                </tbody>
            </table>
        </div>
    </div>
    
</body>

</html>
