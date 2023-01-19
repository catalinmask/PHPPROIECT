<?php
include 'ConnectDb.php';

if(isset($_POST['submit'])){
    $name = $_POST['nume'];
    $surname = $_POST['prenume'];
    $date = $_POST['data_nasterii'];
    $email = $_POST['email'];
    $phone = $_POST['numar_telefon'];
    $role = $_POST['pozitie'];
    $sql = "insert into `Angajati` (nume,prenume,data_nasterii,email,numar_telefon,pozitie)
    values('$name','$surname','$date','$email','$phone','$role')";
    $result=mysqli_query($connection,$sql);
    if($result){
        echo "Signed in successfully!";
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
        <a class="nav-link" href="PresentAtWork.php">Prezenta la locul de munca</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="Vacation.php">Concedii </a>
      </li>
    </ul>
  </div>
</nav>

    <div class="container">
        <form method="post">
            <div class="form-group">
                <label>Nume</label>
                <input type="text" class="form-control" placeholder="Enter your name" name="nume" required>
            </div>
            <div class="form-group">
                <label>Prenume</label>
                <input type="text" class="form-control" placeholder="Enter your surname" name="prenume" required>
            </div>
            <div class="form-group">
                <label>Data Nasterii</label>
                <input type="date" class="form-control" placeholder="Enter your date of birth" name="data_nasterii" required>
            </div>
            <div class="form-group">
                <label>Email</label>
                <input type="email" class="form-control" placeholder="Enter your email" name="email" required>
            </div>
            <div class="form-group">
                <label>Numar de telefon</label>
                <input type="text" class="form-control" placeholder="Enter your phone number" name="numar_telefon" required>
            </div>
            <div class="form-group">
                <label>Pozitie</label>
                <input type="text" class="form-control" placeholder="Enter your role" name="pozitie" required>
            </div>

            <button type="submit" name="submit" class="btn btn-primary">Submit</button>
        </form>
    </div>
</body>

</html>