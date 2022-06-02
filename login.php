<?php
include '_dbconnect.php';
$login = false;
$showLog=false;
$showError=false;
if($_SERVER["REQUEST_METHOD"] == "POST"){
  $username = $_POST["username"];
  $password = $_POST["password"];

  $sql = "Select * from user where username='$username' AND password='$password'";
  $result =  mysqli_query($conn, $sql);
  $num = mysqli_num_rows($result);
  $data = mysqli_fetch_array($result);
  if($num==1){
    $login=true;
    $showLog=true;
    session_start();
    $_SESSION['loggedin']=true;
    $_SESSION['username']=$username;
    $_SESSION['name']=$data['name'];
    header("location: index.php");
  }
  else{
    $showError=true;
  }
    
}

?>


<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-+0n0xVW2eSR5OomGNYDnhzAbDsOXxcvSN1TPprVMTNDbiYZCxYbOOl7+AMvyTG2x" crossorigin="anonymous">
    <link rel="stylesheet" href="css/login.css">
    <title>Log in Go Cars</title>
  </head>
  <body>
     <!-- Navigation-->
  <nav class="navbar navbar-expand-lg navbar-dark bg-primary">
  <div class="container-fluid">
    
    <a class="navbar-brand" href="#">Go Cars</a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <ul class="navbar-nav me-auto mb-2 mb-lg-0">
        <li class="nav-item">
          <a class="nav-link" href="index.php">Home</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="bookcar.php">Book Now</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="#">Rent Your Car</a>
        </li>
       
        </li>
        <li class="nav-item">
          <a class="nav-link" href="#">Contact Us</a>
        </li>
        <!--<li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
            Dropdown
          </a>
          <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
            <li><a class="dropdown-item" href="#">Action</a></li>
            <li><a class="dropdown-item" href="#">Another action</a></li>
            <li><hr class="dropdown-divider"></li>
            <li><a class="dropdown-item" href="#">Something else here</a></li>
          </ul>
        </li>-->
        <li class="nav-item">
          <a class="nav-link disabled" href="#" tabindex="-1" aria-disabled="true">Subscribe</a>
        </li>
      </ul>
    </div>
  </div>
</nav>

<?php
if($showLog){
  echo '<div class="alert alert-success alert-dismissible fade show" role="alert">
      Logged In successfully!
    </div>';
}
?>
<?php
if($showError){
  echo '<div class="alert alert-danger alert-dismissible fade show" role="alert">
      Invalid Credentials!
    </div>';
}
?>
<div class="headingmy">
  <h1>Book A Car Now</h1>
</div>
    <!--Login form-->
    <form action="login.php" method="post">
        <div class="form-group mb-6">
            <label for="username" class="form-label">Email address</label>
            <input type="text" class="form-control" name="username" id="username" aria-describedby="emailHelp">
        </div>
        <div class="form-group mb-6">
            <label for="password" class="form-label">Password</label>
            <input type="password" class="form-control" name="password" id="password">
        </div>
        <br>
        <div class="form-btn">
            <button type="submit" class="btn btn-primary">Submit</button>
            <a href="signup.php"><button type="button" class="btn btn-danger">Sign Up</button></a>
        </div>
    </form>
    
    <!-- Optional JavaScript; choose one of the two! -->


    <!-- Option 1: Bootstrap Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-gtEjrD/SeCtmISkJkNUaaKMoLD0//ElJ19smozuHV6z3Iehds+3Ulb9Bn9Plx0x4" crossorigin="anonymous"></script>

    <!-- Option 2: Separate Popper and Bootstrap JS -->
    <!--
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/js/bootstrap.min.js" integrity="sha384-Atwg2Pkwv9vp0ygtn1JAojH0nYbwNJLPhwyoVbhoPwBhjQPR5VtM2+xf0Uwh9KtT" crossorigin="anonymous"></script>
    -->
  </body>
</html>