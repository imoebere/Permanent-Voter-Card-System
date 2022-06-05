<?php session_start();
      include 'Backend/connect.php'; 
      $id2 = $_SESSION['go'];
            
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
                    <img src="Img/Logo.jpg" alt="Logo" height="50">
                    <span class="badge  bg-dark">INDEPENDENT</span>
                    <span class="badge  bg-success">NATIONAL ELECTORAL COMMISSION</span>
                </a>
            </div>
        </nav>
    </div>
<div class="container-fluid">
    <div class="row">
        <?php
            $select = "SELECT * FROM Reg_tbl where id ='$id2'";
            $query=mysqli_query($conn,$select);
            $row_num = mysqli_num_rows($query);
            while ($row=mysqli_fetch_assoc($query)){
                $name = $row ['Last_Name'].' '.$row ['First_Name'].' '.$row ['Middle_Name'];
                $Email = $row ['Email'];
                $Age = $row ['Age'];
                $passport = $row ['Image'];
            }
        ?>
        
        <div class="col-lg-4 col-md-4">
                <ul class="nav flex-column">
                    <li class="nav-item">
                        <img src="<?php echo $passport; ?>" alt="Passport" height="200px" width="150px">
                    </li>
                    <li class="nav-item">
                        <a class="nav-link active" aria-current="page" href="Dashboard.php">Dashboard</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="Register.php">Register</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">Contact</a>
                    </li>
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                        Manage Account
                        </a>
                        <ul class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
                            <li><a class="dropdown-item" href="#">Update</a></li>
                            <li><a class="dropdown-item" href="LogOut.php">LogOut</a></li>
                        </ul>
                    </li>
                </ul>
        </div>
        <div class="col-lg-8 col-md-8">
            <form  class="rounded-3 bg-light">
                    <div class="form-floating mb-3">
                        <input type="text" class="form-control-plaintext" id="staticEmail2" readonly  value="<?php echo $name; ?>">
                        <label for="floatingInput">FULL NAME</label>
                    </div>
                    <div class="form-floating mb-3">
                        <input type="email" class="form-control-plaintext" id="staticEmail2" readonly  value="<?php echo $Email; ?>">
                        <label for="floatingInput">E-MAIL</label>
                    </div>
                    <div class="form-floating mb-3">
                        <input type="Number" class="form-control-plaintext" id="staticEmail2" readonly value="<?php echo $Age; ?>">
                        <label for="floatingInput">Age</label>
                    </div>
            </form>
        </div>
    </div>
</div>




<!-- Bootstrap Javascript -->
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.5/dist/umd/popper.min.js" integrity="sha384-Xe+8cL9oJa6tN/veChSP7q+mnSPaj5Bcu9mPX5F5xIGE0DVittaqT5lorf0EI7Vk" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/js/bootstrap.min.js" integrity="sha384-kjU+l4N0Yf4ZOJErLsIcvOU2qSb74wXpOhqTvwVx3OElZRweTnQ6d31fXEoRD1Jy" crossorigin="anonymous"></script>

</body>
</html>