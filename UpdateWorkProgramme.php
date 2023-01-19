<?php
include 'ConnectDb.php';
$id = $_GET['updateId'];
$name = $_GET['name'];
$query = "SELECT
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
    $result1 = mysqli_query($connection, $query);
    $row = mysqli_fetch_assoc($result1);
    
    $Name = $_POST['Nume'];
    $Surname = $_POST['Prenume'];
    $Days = $_POST['zi_saptamana'];
    $HourStarProgramme = $_POST['ora_inceput'];
    $HourFinishProgramme = $_POST['ora_sfarsit'];
    $HourStartBreak = $_POST['pauza_masa_inceput'];
    $HourFinishBreak=$_POST['pauza_masa_sfarsit'];


if (isset($_POST['submit'])) {
    $days = $_POST['Days'];
    $hourStarProgramme = $_POST['HourStarProgramme'];
    $hourFinishProgramme = $_POST['HourFinishProgramme'];
    $hourStartBreak = $_POST['HourStartBreak'];
    $hourFinishBreak = $_POST['HourFinishBreak'];

    $sql = "UPDATE `Program_lucru` SET zi_saptamana='$days', 
        ora_inceput='$hourStarProgramme',ora_sfarsit='$hourFinishProgramme',
        pauza_masa_inceput='$hourStartBreak', pauza_masa_sfarsit='$hourFinishBreak' 
        WHERE id=$id";

    $result = mysqli_query($connection, $sql);

    if ($result && mysqli_affected_rows($connection) > 0) {
        echo "Updated successfully!";
        $query = "SELECT
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
        inner join Angajati a on a.nume='$name'";
        $result1 = mysqli_query($connection, $query);
        $row = mysqli_fetch_assoc($result1);
    
        $Name = $_POST['Nume'];
        $Surname = $_POST['Prenume'];
        $Days = $_POST['zi_saptamana'];
        $HourStarProgramme = $_POST['ora_inceput'];
        $HourFinishProgramme = $_POST['ora_sfarsit'];
        $HourStartBreak = $_POST['pauza_masa_inceput'];
        $HourFinishBreak=$_POST['pauza_masa_sfarsit'];
    }
}

?>
<!doctype html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="styles.css">
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
        <a class="nav-link" href="Employees.php">Angajati</span></a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="Delay.php">Intarzieri</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="WorkProgramme.php">Program de lucru</a>
      </li>
      <li class="nav-item">
        <a class="nav-link disabled" href="PresentAtWork.php">Prezenta la locul de munca</a>
      </li>
      <li class="nav-item">
        <a class="nav-link disabled" href="Vacation.php">Concedii </a>
      </li>
    </ul>
  </div>
</nav>


<div class="container">
<form method="post">
  <div class="form-group">
    <label for="inputDays">Zi</label>
    <input type="text" class="form-control" id="inputDays" name="Days" value="<?php echo $row['zi_saptamana']; ?>">
  </div>
  <div class="form-group">
    <label for="inputHourStarProgramme">Ora inceput</label>
    <input type="text" class="form-control" id="inputHourStarProgramme" name="HourStarProgramme" value="<?php echo $row['ora_inceput']; ?>">
  </div>
  <div class="form-group">
    <label for="inputHourFinishProgramme">Ora sfarsit</label>
    <input type="text" class="form-control" id="inputHourFinishProgramme" name="HourFinishProgramme" value="<?php echo $row['ora_sfarsit']; ?>">
  </div>
  <div class="form-group">
    <label for="inputHourStartBreak">Pauza de masa inceput</label>
    <input type="text" class="form-control" id="inputHourStartBreak" name="HourStartBreak" value="<?php echo $row['pauza_masa_inceput']; ?>">
  </div>
  <div class="form-group">
    <label for="inputHourStartBreak">Pauza de masa sfarsit</label>
    <input type="text" class="form-control" id="inputHourStartBreak" name="HourFinishBreak" value="<?php echo $row['pauza_masa_sfarsit']; ?>">
  </div>
            <button type="submit" name="submit" class="btn btn-primary">Submit</button>
        </form>
    </div>

</body>

</html>