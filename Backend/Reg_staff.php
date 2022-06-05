<?php session_start();
      include 'connect.php'; 
      $id2 = $_SESSION['gone'];
            
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!--### UNICONS CSS ###-->
    <link rel="stylesheet" href="https://unicons.iconscout.com/release/v4.0.0/css/line.css">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-0evHe/X+R7YkIZDRvuzKMRqM+OrBnVFBL6DOitfPri4tjfHxaWutUpFmBp4vmVor" crossorigin="anonymous">
    
    <!-- Main CSS -->
    <link href="CSS/style.css" rel="stylesheet">
    <title>Dashbord</title>
</head>
<body>
    <div class="container-fluid">
        <nav class="navbar sticky-top navbar-expand-lg bg-light">
            <div class="container">
                <a class="navbar-brand" href="Dashboard.php"> 
                    <img src="../Img/Logo.jpg" alt="Logo" height="50">
                    <span class="badge  bg-dark">INDEPENDENT</span>
                    <span class="badge  bg-success">NATIONAL ELECTORAL COMMISSION</span>
                </a>
            </div>
        </nav>
    </div>
<div class="container-fluid">
    <div class="row">
        <?php
            $select = "SELECT * FROM Admin_tbl where id ='$id2'";
            $query=mysqli_query($conn,$select);
            $row_num = mysqli_num_rows($query);
            while ($row=mysqli_fetch_assoc($query)){
                $username = $row ['username'];
                $_SESSION['admin'] = $username;
            }
        ?>
        
        <div class="col-lg-4 col-md-4">
                <ul class="nav flex-column">
                    <div class="input-group mb-3">
                        <a class="active w-50 btn btn-lg btn-outline-success" aria-current="page" href="Admin_Dashboard.php">Dashboard</a>
                    </div>
                
                    <li class="nav-item dropdown">
                        <a class="w-50 btn btn-lg btn-outline-success dropdown-toggle" href="#" id="navbarDropdownMenuLink" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                        Manage Account
                        </a>
                        <ul class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
                            <li><a class="w-100 btn btn-lg dropdown-item" href="Reg_staff.php">Register New Staff</a></li>
                            <li><a class="w-100 btn btn-lg dropdown-item" href="View_staff.php">View Registered Staff</a></li>
                            <li><a class="w-100 btn btn-lg dropdown-item" href="View_Voter.php">View Registered Voter</a></li>
                            <li><a class="w-100 btn btn-lg dropdown-item" href="View_Reg_Voter.php">View Sign Up</a></li>
                            <li><a class="w-100 btn btn-lg dropdown-item" href="View_Voter_Login.php">View Voter Login</a></li>
                            <li><a class="w-100 btn btn-lg dropdown-item" href="View_VIN.php">View VIN</a></li>
                            <li><a class="w-100 btn btn-lg dropdown-item" href="#">Update</a></li>
                            <li><a class="w-100 btn btn-lg dropdown-item" href="LogOut.php">LogOut</a></li>
                        </ul>
                    </li>
                </ul>
        </div>
        <div class="col-lg-8 col-md-8">
            <h1> Welcome <?php echo $_SESSION['admin']; ?> </h1>
            <form method="post" enctype="multipart/form-data" class="p-4  border rounded-3 bg-light">
                <div class="input-group mb-3">
                    <span class="input-group-text" id="inputGroup-sizing-default"><strong>Full Name:</strong></span>
                    <input type="text" class="form-control" required name="name" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-default">
                    <span class="input-group-text" id="inputGroup-sizing-default"><strong>Email:</strong></span>
                    <input type="email" class="form-control" required name="email" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-default">
                </div>
                <div class="input-group mb-3">
                    <span class="input-group-text" id="inputGroup-sizing-default"><strong>Telephone:</strong></span>
                    <input type="number" class="form-control" required name="telephone" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-default">
                </div>
                <!--<div class="input-group mb-3">
                    <label class="input-group-text" for="inputGroupSelect01"><strong>Gender:</strong></label>
                    <select class="form-select" name="gender" required id="inputGroupSelect01">
                        <option selected>Choose...</option>
                        <option value="Male">Male</option>
                        <option value="Female">Female</option>
                    </select>
                    <span class="input-group-text" id="inputGroup-sizing-default"><strong>Date of Birth:</strong></span>
                    <input type="date" class="form-control"  required name="dob" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-default">
                </div>-->
                <div class="input-group mb-3">
                    <button type="submit" class="w-100 btn btn-lg btn-success" name="Submit">Submit</button>
                </div>
                <?php 
                  if (isset($_POST['Submit'])){
                    $user_id = $_SESSION['admin'];
                    $name = trim($_POST['name']);
                    $email = trim(strtolower($_POST['email']));
                    $telephone = trim($_POST['telephone']);
                    $password = (rand(921,231).chr(rand(65, 90)).chr(rand(90, 65)).rand(9999, 2468));
                    $select = "SELECT * FROM staff_tbl where Email ='$email'";
                    $query=mysqli_query($conn,$select);
                    $row_num = mysqli_num_rows($query);
                    if ($row_num>0){
                        echo '<script type="text/javascript">alert("You have an account already")</script>'.'<br>';
                    }else{
                      $insert = "INSERT INTO staff_tbl (User_id,Name,Email,Phone,pwd)
                      VALUES('$user_id','$name','$email','$telephone','$password')";
                      $result=mysqli_query($conn,$insert);
                      if ($insert){ 
                        echo"<META http-equiv='refresh' content='0;URL=Reg_staff.php'>";
                          ?>
                                    <div class="alert alert-success">
                                        <strong>Your Password is: <?php echo $password; ?></strong>
                                    </div>
                                    <?php
                       
                      }}}
                      ?>
                  
            </form>
        </div>
    </div>
</div>




<!-- Bootstrap Javascript -->
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.5/dist/umd/popper.min.js" integrity="sha384-Xe+8cL9oJa6tN/veChSP7q+mnSPaj5Bcu9mPX5F5xIGE0DVittaqT5lorf0EI7Vk" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/js/bootstrap.min.js" integrity="sha384-kjU+l4N0Yf4ZOJErLsIcvOU2qSb74wXpOhqTvwVx3OElZRweTnQ6d31fXEoRD1Jy" crossorigin="anonymous"></script>

</body>
</html>