<?php session_start();
      include 'connect.php';  ?>
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
    <link href="../CSS/style.css" rel="stylesheet">
    <title>Admin Login</title>
</head>
<body>
<div class="container">
    <div class="row justify-content-center">

        <div class="col-md-6 col-lg-6">
            <span class="badge bg-success login-icon"><i class="uil uil-signin login-icon"></i>ADMIN LOGIN</span>
            <form method="post" enctype="multipart/form-data" class="p-4 border rounded-3 bg-light">
                
                <div class="form-floating mb-3">
                    <input type="text" class="form-control" id="floatingInput" required placeholder="name@example.com" name="username" autocomplete="off">
                    <label for="floatingInput">Username</label>
                </div>
                <div class="form-floating mb-3">
                    <input type="password" class="form-control" id="floatingPassword" required placeholder="Password" name="pwd">
                    <label for="floatingPassword">Password</label>
                </div>
                <div class="form-floating mb-3">
                    <button class="w-100 btn btn-lg btn-success" type="submit" name="Login">Login</button>
                </div>
                <div class="form-floating mb-3">
                    <a class="w-100 btn btn-lg btn-outline-success" type="submit" href="../index.php">Home Page</a>
                </div>
                <hr class="my-4">
                <?php 
                    if(isset($_POST['Login'])){
                        $username = trim($_POST['username']);
                        $pwd = trim($_POST['pwd']);
                        $select = "SELECT * FROM Admin_tbl where username ='$username' and password = '$pwd'";
                        $query=mysqli_query($conn,$select);
                        $row_num = mysqli_num_rows($query);
                        while ($row=mysqli_fetch_assoc($query)){
                              $id = $row ['id'];
                              
                        }
                              if ($row_num>0){
                                $_SESSION['gone'] = $id;
                                echo"<META http-equiv='refresh' content='0;URL=Admin_Dashboard.php'>";
                                  }else{?>
                                    <div class="alert alert-danger">
                                        <strong>Invalid Login Detail!</strong><br/>
                                    </div>
                        <?php }} ?>
            </form>
        </div>
</div>




<!-- Bootstrap Javascript -->
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.5/dist/umd/popper.min.js" integrity="sha384-Xe+8cL9oJa6tN/veChSP7q+mnSPaj5Bcu9mPX5F5xIGE0DVittaqT5lorf0EI7Vk" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/js/bootstrap.min.js" integrity="sha384-kjU+l4N0Yf4ZOJErLsIcvOU2qSb74wXpOhqTvwVx3OElZRweTnQ6d31fXEoRD1Jy" crossorigin="anonymous"></script>

</body>
</html>