<?php
$showLog=False;
$showError=False;
session_start();
if(!isset($_SESSION["loggedin"]) || $_SESSION["loggedin"]!=true){
  header("location: login.php");
}
include '_dbconnect.php';
if($_SERVER["REQUEST_METHOD"] == "POST"){
  $pickup = $_POST['pick'];
  $dropof = $_POST['drop'];
  $cmodel = $_POST['cmodel'];
  $username = $_SESSION['username'];
  $dfrom = date('y-m-d',strtotime($_POST['from-date']));
  $dtill = date('y-m-d',strtotime($_POST['till-date']));
  $sql = "INSERT INTO `bookd` (`username`, `fromdt`, `till`, `pick`, `drop-add`, `car-model`) VALUES ('$username', '$dfrom', '$dtill', '$pickup', '$dropof', '$cmodel')";

  
  if($dfrom>$dtill){
    echo '<div class="alert alert-warning alert-dismissible fade show" role="alert">
    <strong>Date Error!</strong> Till date should be after From Date.
    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
  </div>';
  }
  else{
    $result =  mysqli_query($conn, $sql);

    if($result){
      $showLog=true;
      }

    else{
      $showError=true;
      }
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
    <!--<link rel="stylesheet" href="css/bookcar.css">-->
    <link rel="stylesheet" href="css/slide.css">
    <link rel="stylesheet" href="./index-style.css">
    
    <title>Book now</title>
    
    <script src="script/bookcar.js"></script>
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
          <a class="nav-link active" aria-current="page" href="#">Book Now</a>
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
      <form class="d-flex">
        <!--<input class="form-control me-2" type="search" placeholder="Search" aria-label="Search">-->
        <!--<a class="btn btn-outline-light" href="login.php" role="button">Link</a>-->
        <?php 
        if(!isset($_SESSION['loggedin'])){
        ?>
        <div class="dropdown">
          <button class="btn btn-outline-light dropdown-toggle" type="button" id="dropdownMenuButton1" data-bs-toggle="dropdown" aria-expanded="false">
            Login
          </button>
          <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="dropdownMenuButton1">
            <li><a class="dropdown-item" href="login.php">Log into an account</a></li>
            <li><a class="dropdown-item" href="signup.php">New Here? Sign Up</a></li>
          </ul>
        </div>
        <?php
        }else{
        ?>
         <div class="dropdown">
          <button class="btn btn-outline-light dropdown-toggle" type="button" id="dropdownMenuButton1" data-bs-toggle="dropdown" aria-expanded="false">
            Welcome <?php echo $_SESSION['name']; ?>
          </button>
          <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="dropdownMenuButton1">
            <li><a class="dropdown-item" href="dashboard.php">My dash Board</a></li>
            <li><a class="dropdown-item" href="logout.php">Logout</a></li>
          </ul>
        </div>
        <?php 
        }
        ?>
      </form>
    </div>
  </div>
</nav>
<?php
if($showLog){
  echo '<div class="alert alert-success alert-dismissible fade show" role="alert">
  <strong>Booking Confirmed</strong> Thank you for booking, may you have great experience.
  <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
</div>';
}
?>
<?php
if($showError){
  echo '<div class="alert alert-warning alert-dismissible fade show" role="alert">
    <strong>Data Base Error!</strong> A Error occured while inserting data.
    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
  </div>';
}
?>


<div id="carouselExampleCaptions" class="carousel slide" data-bs-ride="carousel">
  <div class="carousel-indicators">
    <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
    <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="1" aria-label="Slide 2"></button>
    <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="2" aria-label="Slide 3"></button>
  </div>
  <div class="carousel-inner">
    <div class="carousel-item active">
      <img src="img/Slideshow/ss1.jpg" class="d-block w-100" alt="...">
      <div class="carousel-caption d-none d-md-block">
        <h5>Want Your Own Ride?</h5>
        <p>Book your very own car now.</p>
      </div>
    </div>
    <div class="carousel-item">
      <img src="img/Slideshow/ss2.jpg" class="d-block w-100" alt="...">
      <div class="carousel-caption d-none d-md-block">
        <h5>Take a holiday</h5>
        <p>Now go on to holiday without hasitation of cabs and taxi by booking your own car.</p>
      </div>
    </div>
    <div class="carousel-item">
      <img src="img/Slideshow/ss3.jpg" class="d-block w-100" alt="...">
      <div class="carousel-caption d-none d-md-block">
        <h5>High range of variety</h5>
        <p>Choose your favorite car from high range variety of Go Cars.</p>
      </div>
    </div>
  </div>
  <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide="prev">
    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
    <span class="visually-hidden">Previous</span>
  </button>
  <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide="next">
    <span class="carousel-control-next-icon" aria-hidden="true"></span>
    <span class="visually-hidden">Next</span>
  </button>
</div>

<div class="bg-wall">
  <div class="bg-in"> 
  </div>
</div>

<div class="heading">
  <h1>Book A Car Now</h1>
</div>


<!-- Booking Form -->
<div class="form-container">
 <form action="bookcar.php" method="post">
        <div class="book-form">
            <label for="pick" class="form-label">Pick Up Point</label>
            <input type="text" placeholder="Enter address" class="form-control" name="pick" id="pick" require>
        </div>
        <div class="book-form">
            <label for="drop" class="form-label">Drop location</label>
            <input type="text" placeholder="Enter address" class="form-control" name="drop" id="drop" require>
        </div>
        
        <div class="book-form">
            <label for="cmodel" class="form-label">Available Cars</label>
            <select class="form-select" name="cmodel" id="cmodel" aria-label="Default select example" onchange="showCar()" require>
            <option value="nocar" selected>Select a vechicle</option>
            <option value="swift">Swift</option>
            <option value="verna">Verna</option>
            <option value="creta">Creta</option>
          </select>
        </div>

        <div class="book-form">
        <img src="cars/bg.jpg" class="img-thumbnail" alt="..." id="cardisplay">
        </div>

        <div class="book-form">
            <label for="from-date" class="form-label">From When Do You Need Car</label>
            <input type="Date" class="form-control" name="from-date" id="from-date" require>
        </div>
        <div class="book-form">
            <label for="till-date" class="form-label">Till When Do You Need Car</label>
            <input type="date" class="form-control" name="till-date" id="till-date" require>
        </div>
        <br>
        <?php
        if(isset($_SESSION['loggedin'])){
        ?>
        <div class="book-form">
            <button type="submit" class="btn btn-success" id="sub">Book</button>
        </div>
        <?php
        }
        else{
          ?>
          <div class="book-form">
            <a href="login.php"><button type="button" class="btn btn-success">Book</button></a>
        </div>
        <?php
        }
        ?>
  </form>
</div>
<br>
<?php
if($showLog){
  echo '<div class="alert alert-success alert-dismissible fade show" role="alert">
  <strong>Booking Confirmed</strong> Thank you for booking, may you have great experience.
  <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
</div>';
}
?>
<?php
if($showError){
  echo '<div class="alert alert-warning alert-dismissible fade show" role="alert">
    <strong>Data Base Error!</strong> A Error occured while inserting data.
    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
  </div>';
}
?>

<div class="bg-wall">
  <div class="bg-in"> 
  </div>
</div>


    <!-- Optional JavaScript; choose one of the two! -->

    <script src="script/bookcar.js"></script>
    <!-- Option 1: Bootstrap Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-gtEjrD/SeCtmISkJkNUaaKMoLD0//ElJ19smozuHV6z3Iehds+3Ulb9Bn9Plx0x4" crossorigin="anonymous"></script>

    <!-- Option 2: Separate Popper and Bootstrap JS -->
    <!--
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/js/bootstrap.min.js" integrity="sha384-Atwg2Pkwv9vp0ygtn1JAojH0nYbwNJLPhwyoVbhoPwBhjQPR5VtM2+xf0Uwh9KtT" crossorigin="anonymous"></script>
    -->
  </body>


</div>
</html>

<!--
  INSERT INTO `test` (`bookno`, `username`, `fromdt`, `till`, `pick`, `drop-add`, `car-model`) VALUES (NULL, 'jeet3', '2021-05-24', '2021-05-26', 'Station', 'Station', 'Creta');
  INSERT INTO `test` (`bookno`, `username`, `fromdt`, `till`, `pick`, `drop-add`, `car-model`) VALUES ('1', 'jeet1', '2021-05-25', '2021-05-26', 'central park Agashi road Virar west', 'central park Agashi road Virar west', 'Verna');

  INSERT INTO `test` (`username`, `fromdt`, `till`, `pick`, `drop-add`, `car-model`) VALUES ('jeet1', '21-05-25', '21-05-26', 'Central park', 'Central park', 'swift')
  -->