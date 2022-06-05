<?php session_start();
      include 'Backend/connect.php'; ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    
    <title>Permanent Voter Card</title>
    <!--### UNICONS CSS ###-->
    <link rel="stylesheet" href="https://unicons.iconscout.com/release/v4.0.0/css/line.css">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-0evHe/X+R7YkIZDRvuzKMRqM+OrBnVFBL6DOitfPri4tjfHxaWutUpFmBp4vmVor" crossorigin="anonymous">
    
    <!-- Main CSS -->
    <link href="CSS/style.css" rel="stylesheet">
</head>
<body>
<!--###### Nav Bar #######-->
<nav class="navbar sticky-top navbar-expand-lg bg-light">
  <div class="container">
    <a class="navbar-brand" href="Index.php"> 
        <img src="Img/Logo.jpg" alt="Logo" height="50">
        <span class="badge  bg-dark">INDEPENDENT</span>
        <span class="badge  bg-success">NATIONAL ELECTORAL COMMISSION</span>
    </a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarNavDropdown">
      <ul class="navbar-nav justify-content-end">
        <li class="nav-item">
          <a class="nav-link active" aria-current="page" href="#">Home</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="#">Blog</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="#contact">Contact</a>
        </li>
        <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" role="button" data-bs-toggle="dropdown" aria-expanded="false">
            Login
          </a>
          <ul class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
            <li><a class="dropdown-item" href="#Login">Sign Up</a></li>
            <li><a class="dropdown-item" href="Backend/index.php">Admin Login</a></li>
          </ul>
        </li>
      </ul>
    </div>
  </div>
</nav>
<!--#### Carousel ####-->
<div id="carouselExampleCaptions" class="carousel slide" data-bs-ride="false">
  <div class="carousel-indicators">
    <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
    <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="1" aria-label="Slide 2"></button>
    <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="2" aria-label="Slide 3"></button>
  </div>
  <div class="carousel-inner">
    <div class="carousel-item active">
      <img src="Img/INEC.jpeg" class="d-block w-100" alt="..." height="500px">
    </div>
    <div class="carousel-item">
      <img src="Img/CVR.jpg" class="d-block w-100" alt="..." height="500px">
    </div>
    <div class="carousel-item">
      <img src="Img/PVC.jpg" class="d-block w-100" alt="..." height="500px">
    </div>
  </div>
  <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide="prev">
    <span class="carousel-control-prev-icon bg-success" aria-hidden="true"></span>
    <span class="visually-hidden">Previous</span>
  </button>
  <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide="next">
    <span class="carousel-control-next-icon bg-success" aria-hidden="true"></span>
    <span class="visually-hidden">Next</span>
  </button>
</div>
<hr class="featurette-divider">
<!--#### MAIN Container ####-->
<div class="container-fluid" id="Login">
    <div class="row">
        <div class="col-md-4 col-lg-4">
            <span class="badge bg-success login-icon"><i class="uil uil-signin login-icon"></i>LOGIN</span>
            <form method="post" enctype="multipart/form-data" class="p-4 border rounded-3 bg-light">
                
                <div class="form-floating mb-3">
                    <input type="email" class="form-control" id="floatingInput" required placeholder="name@example.com" name="Email" autocomplete="off">
                    <label for="floatingInput">Email address</label>
                </div>
                <div class="form-floating mb-3">
                    <input type="password" class="form-control" id="floatingPassword" required placeholder="Password" name="pwd">
                    <label for="floatingPassword">Password</label>
                </div>
                <button class="w-100 btn btn-lg btn-success" type="submit" name="Login">Login</button>
                <hr class="my-4">
                <?php 
                    if(isset($_POST['Login'])){
                        $Email = trim(strtolower($_POST['Email']));
                        $pwd = trim($_POST['pwd']);
                        $select = "SELECT * FROM Reg_tbl where Email ='$Email' and pwd = '$pwd'";
                        $query=mysqli_query($conn,$select);
                        $row_num = mysqli_num_rows($query);
                        while ($row=mysqli_fetch_assoc($query)){
                              $id = $row ['id'];
                              $name = $row ['Last_Name'].' '.$row ['First_Name'].' '.$row ['Middle_Name'];
                              $Email = $row ['Email'];
                        }
                              if ($row_num>0){
                              
                                $_SESSION['go'] = $id;
                                //header error
                                //header('location:Pers.php');
                                $insert = "INSERT INTO Log_Tbl (Email,pwd)
                                    VALUES('$Email','$pwd')";
                                    $result=mysqli_query($conn,$insert);
                                    echo"<META http-equiv='refresh' content='0;URL=Dashboard.php'>";
                                
                                  }else{?>
                                    <div class="alert alert-warning">
                                        <strong>Invalid Login Detail! Sign Up to Login</strong><br/>
                                    </div>
                        <?php }} ?>
            </form>
        </div>
        <div class="col-md-2 col-lg-2">
            <span class="badge bg-success login-icon"><i class="uil uil-signin login-icon"></i>Check VIN</span>
            <form method="post" enctype="multipart/form-data" class="p-4 border rounded-3 bg-light">
                
                <div class="form-floating mb-3">
                    <input type="text" class="form-control" id="floatingInput" required placeholder="name@example.com" name="vin" autocomplete="off">
                    <label for="floatingInput">VIN:</label>
                </div>
                <button class="w-100 btn btn-lg btn-success" type="submit" name="check">Verify</button>
                <hr class="my-4">
                <?php 
                    if(isset($_POST['check'])){
                        $vin = trim($_POST['vin']);
                        $select = "SELECT * FROM Voter_tbl where VIN ='$vin'";
                        $query=mysqli_query($conn,$select);
                        $row_num = mysqli_num_rows($query);
                        while ($row=mysqli_fetch_assoc($query)){
                              $id2 = $row ['id'];
                              $name = $row ['Name'];
                              $Email = $row ['Email'];
                        } if($row_num>0){
                                    $_SESSION['run'] = $id2;
                                    echo"<META http-equiv='refresh' content='0;URL=check_card.php'>";
                        }else{
                                  ?>
                                    <div class="alert alert-warning">
                                        <strong>Invalid <br/>Voter Identification Number</strong><br/>
                                    </div>
                        <?php } }?>
            </form>
        </div>                             
        <div class="col-lg-6 col-xxl-6 col-md-6">
          <span class="badge  bg-success login-icon"><i class="uil uil-registered login-icon"></i>SIGN UP</span>
          <form method="post" enctype="multipart/form-data" class="p-4  border rounded-3 bg-light">
                <div class="input-group mb-3">
                    <input type="file" class="form-control" id="inputGroupFile02" name="image">
                    <label class="input-group-text" for="inputGroupFile02">Upload</label>
                </div>
                <div class="form-floating mb-3">
                    <input type="text" class="form-control" id="floatingInput" required placeholder="name@example.com" name="FName" autocomplete="off">
                    <label for="floatingInput">First Name</label>
                </div>
                <div class="form-floating mb-3">
                    <input type="text" class="form-control" id="floatingInput"  placeholder="name@example.com" name="MName" autocomplete="off">
                    <label for="floatingInput">Middle Name <i>(Optional)</i></label>
                </div>
                <div class="form-floating mb-3">
                    <input type="text" class="form-control" id="floatingInput" required placeholder="name@example.com" name="LName" autocomplete="off">
                    <label for="floatingInput">Last Name</label>
                </div>
                <div class="form-floating mb-3">
                    <input type="Number" class="form-control" id="floatingInput" required placeholder="name@example.com" name="Age" autocomplete="off">
                    <label for="floatingInput">Age <i>(You must be 18 and Above)</i></label>
                </div>
                <div class="form-floating mb-3">
                    <input type="email" class="form-control" id="floatingInput" required placeholder="name@example.com" name="Email" autocomplete="off">
                    <label for="floatingInput">Email address</label>
                </div>
                <div class="form-floating mb-3">
                    <input type="password" class="form-control" id="floatingPassword" required placeholder="Password" name="pwd">
                    <label for="floatingPassword">Password</label>
                </div>
                <div class="form-floating mb-3">
                    <input type="password" class="form-control" id="floatingPassword" required placeholder="Password" name="Cpwd">
                    <label for="floatingPassword">Confirm Password</label>
                </div>
                <button class="w-100 btn btn-lg btn-success" type="submit" name="SignUp">Sign Up</button>
                <hr class="my-4">
                <?php 
                  if (isset($_POST['SignUp'])){
                    $Fname = trim($_POST['FName']);
                    $MName = trim($_POST['MName']);
                    $LName = trim($_POST['LName']);
                    $Age = trim($_POST['Age']);
                    $VoterAge = 18;
                    $image = addslashes(file_get_contents($_FILES['image']['tmp_name']));
                                $image_name = addslashes($_FILES['image']['name']);
                                $image_size = getimagesize($_FILES['image']['tmp_name']);

                                move_uploaded_file($_FILES["image"]["tmp_name"], "Upload/" . $_FILES["image"]["name"]);
                                $location = "Upload/" . $_FILES["image"]["name"];
                    $Email = trim(strtolower($_POST['Email']));
                    $select = "SELECT * FROM Reg_tbl where Email ='$Email'";
                    $result=mysqli_query($conn,$select);
                    $row_num = mysqli_num_rows($result);
                      if ($row_num>0){?>
                        <div class="alert alert-warning">
                            <strong>Email Already Exist</strong><br/>
                        </div>
                        <?php
                    }else{
                    $pwd = trim($_POST['pwd']);
                    $Cpwd = trim($_POST['Cpwd']);
                    if ($Cpwd == $pwd && $Age >= $VoterAge){
                      $insert = "INSERT INTO Reg_tbl (Image,Last_Name,First_Name,Middle_Name,Age,Email,pwd)
                      VALUES('$location','$LName','$Fname','$MName','$Age','$Email','$pwd')";
                      $result=mysqli_query($conn,$insert);
                      if ($insert){
                        echo '<script type="text/javascript">alert("Your Details have been added successfully, Login to your Profile")</script>'.'<br>';
                        echo"<META http-equiv='refresh' content='0;URL=Index.php'>";
                      }
                     
                }else{ ?>
                  <div class="alert alert-warning">
                        <strong>Password does not match Or You not eligible to voter</strong><br/>
                  </div>
                <?php }}} ?>
          </form>
        </div>
    </div>
</div>
<hr class="featurette-divider">
<!--#### Contact Us ####-->
<div class="container my-5" id="contact">
    <span class="badge bg-success login-icon">Contact Us</span>
    <hr class="featurette-divider">
    <div class="row justify-content-center" style="color:dark; margin:0">
            <div class="col-md-3 col-sm-3 col-xs-12"> 
                    <h4>HELP LINE</h4>
                    <p><i class="uil uil-map-marker contact-icon"></i>Ijeshatedo, Surulere, Lagos.</p>
			              <p><i class="uil uil-phone contact-icon"></i>0813-432-6791, 0808-725-5349</p>
			              <p><i class="uil uil-envelope contact-icon"></i><a href = "mailto: ebedo4real2015@gmail.com">ebedo4real2015@gmail.com</a></p>
            </div>
            <?php   ?>
              <div class="col-md-9 col-sm-9 col-xs-12"> 
                      <span class="badge bg-success login-icon">SEND US A MESSAGE <i class="uil uil-envelope login-icon"></i> </span>
                      <form method="post" enctype="multipart/form-data" class="p-4 p-md-5 border rounded-3 bg-light">
                              <div class="form-floating mb-3">
                                  <input type="text" class="form-control" id="floatingInput" required placeholder="name@example.com" name="Name" autocomplete="off">
                                  <label for="floatingInput">FULL NAME</label>
                              </div>
                              <div class="form-floating mb-3">
                                  <input type="email" class="form-control" id="floatingInput" required placeholder="name@example.com" name="Email" autocomplete="off">
                                  <label for="floatingInput">E-MAIL</label>
                              </div>
                              <div class="form-floating mb-3">
                                  <input type="text" class="form-control" id="floatingInput" required placeholder="name@example.com" name="Phone" autocomplete="off">
                                  <label for="floatingInput">TELEPHONE</label>
                              </div>
                              <div class="form-floating mb-3">
                                  <input type="text" class="form-control" id="floatingInput" required placeholder="name@example.com" name="subject" autocomplete="off">
                                  <label for="floatingInput">SUBJECT</label>
                              </div>
                              <div class="form-floating mb-3">
                                      <textarea class="form-control" rows="10" id="floatingInput" autocomplete="off" required name="Message" placeholder="name@example.com"></textarea>
                                      <label for="floatingInput">How May We Help You?</label>
                              </div>
                              <button type="submit" class="btn btn-success btn-lg" name="send">SEND E-EMAIL <i class="uil uil-message login-icon"></i></button>
                              <?php
                                  if(isset($_POST['send'])){
                                    $Name = trim($_POST['Name']);
                                    $Email = trim($_POST['Email']);
                                    $Phone = trim($_POST['Phone']);
                                    $subject = trim($_POST['subject']);
                                    $Message = trim($_POST['Message']);
                                    
                                    $myMail = "ebedo4real2012@yahoo.com";
                                    $header = "From:" . $Email;
                                    $body   = "You have received an E-mail from" . $Name . "\n\n" . $Message;

                                    mail($myMail, $subject, $body, $header);
                                    $insert = "INSERT INTO Contact_tbl (Name,Email,Phone,subject,Message)
                                                VALUES('$Name','$Email','$Phone','$subject','$Message')";
                                                $result=mysqli_query($conn,$insert);
                                    if ($insert){
                                    echo"<META http-equiv='refresh' content='0;URL=Index.php#contact'>";
                                    }
                                    } 
                              
                              ?>
		                  </form>
              </div>
    </div> 
        
</div>

<!--### Footer ###-->
<div class="container-fluid">
  <footer class="d-flex flex-wrap justify-content-between align-items-center py-3 my-4 border-top">
    <div class="col-md-4 d-flex align-items-center">
      <a href="Index.php" class="mb-3 me-2 mb-md-0 text-muted text-decoration-none lh-1">
        <img src="Img/Logo.jpg" alt="" height="30">
      </a>
      <span class="text-muted login-icon">&copy; 2022 Permanent Voter Card, Inc</span>
    </div>

    <ul class="nav col-md-4 justify-content-end list-unstyled d-flex">
      <li class="ms-3"><a class="text-muted" href="https://www.facebook.com"><i class="uil uil-facebook-f social-icon"></i></a></li>
      <li class="ms-3"><a class="text-muted" href="https://www.instagram.com"><i class="uil uil-instagram social-icon"></i></a></li>
      <li class="ms-3"><a class="text-muted" href="https://www.github.com/imoebere"><i class="uil uil-github social-icon"></i></a></li>
    </ul>
  </footer>
</div>


<!-- Bootstrap Javascript -->
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.5/dist/umd/popper.min.js" integrity="sha384-Xe+8cL9oJa6tN/veChSP7q+mnSPaj5Bcu9mPX5F5xIGE0DVittaqT5lorf0EI7Vk" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/js/bootstrap.min.js" integrity="sha384-kjU+l4N0Yf4ZOJErLsIcvOU2qSb74wXpOhqTvwVx3OElZRweTnQ6d31fXEoRD1Jy" crossorigin="anonymous"></script>


</body>
</html>