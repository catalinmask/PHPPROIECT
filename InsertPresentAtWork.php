<?php
include 'ConnectDb.php';

if(isset($_POST['submit'])){
    $name = $_POST['name'];
    $sql2 = "select id from `Angajati` where nume='$name'";
    $result2 = mysqli_query($connection, $sql2);
    $row = mysqli_fetch_assoc($result2);
    $WorkerId = $row['id'];
    $date = $_POST['date'];
    $Days = $_POST['Days'];
    $sql = "INSERT INTO `Prezenta_la_locul_de_munca`(`id_angajat`, `DATA`) VALUES ('$WorkerId','$date')";
    $result=mysqli_query($connection,$sql);
    if($result){
        echo "successfully!";
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
    <title>Insert</title>
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
        <a class="nav-link " href="PresentAtWork.php">Prezenta la locul de munca</a>
      </li>
      <li class="nav-item">
        <a class="nav-link " href="Vacation.php">Concedii </a>
      </li>
    </ul>
  </div>
</nav>

    <div class="container">
        <form method="post">
            <div class="form-group">
                <label>Nume</label>
                <input type="text" class="form-control"  name="name" required>
            </div>
            <div class="form-group">
                <label>Prenume</label>
                <input type="text" class="form-control" name="surname" required>
            </div>
            <div class="form-group">
                <label>Data</label>
                <input type="date" class="form-control" name="date" required>
            </div>
            <button type="submit" name="submit" class="btn btn-primary">Submit</button>
        </form>
    </div>
</body>

</html>