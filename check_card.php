<?php session_start();
      include 'Backend/connect.php'; 
      $id3 = $_SESSION['run'];
            
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
    <title>Card Check</title>
</head>
<body>
<div class="container-fluid">
        <?php
            $select = "SELECT * FROM Voter_tbl where id ='$id3'";
            $query=mysqli_query($conn,$select);
            $row_num = mysqli_num_rows($query);
            while ($row=mysqli_fetch_assoc($query)){
                $name = $row ['Name'];
                $Resident = $row ['Resident'];
                $SOO = $row ['SOO'];
                $LGA = $row ['LGA'];
                $Occupation = $row ['Occupation'];
                $VIN = $row ['VIN'];
                $passport = $row ['Image'];
            }
            ?>
    <div class="row ">
            <div class="col-lg-3 col-md-3">
                <ul class="nav flex-column">
                    <li class="nav-item">
                        <img src="<?php echo $passport; ?>" alt="Passport" height="100px" width="50px">
                    </li>
                   
                      <div class="input-group mb-3">
                        <a href="LogOut.php" class="w-50 btn btn-lg btn-outline-danger">LOG OUT</a>
                      </div>
                </ul>
            </div>
        <div class="col-lg-8 col-md-8">
            <div class="form-floating mb-3">
                    <img src="<?php echo $passport; ?>" alt="" height="200px" width="150px">
                </div>
                <div class="input-group mb-3">
                    <span class="input-group-text"><strong>VOTER IDENTIFICATION NUMBER:</strong></span>
                    <input type="text" class="form-control" readonly value="<?php echo $VIN; ?>" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-default">
                </div>
                <div class="input-group mb-3">
                    <span class="input-group-text"><strong>FULL NAME:</strong></span>
                    <input type="text" class="form-control" readonly value="<?php echo strtoupper($name); ?>" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-default">
                    <span class="input-group-text"><strong>RESIDENT ADDRESS:</strong></span>
                    <input type="text" class="form-control" readonly value="<?php echo strtoupper($Resident); ?>" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-default">
                </div>
                <div class="input-group mb-3">
                    <span class="input-group-text"><strong>OCCUPATION:</strong></span>
                    <input type="text" class="form-control" readonly value="<?php echo strtoupper($Occupation); ?>" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-default">
                    <span class="input-group-text"><strong>STATE OF ORIGIN:</strong></span>
                    <input type="text" class="form-control" readonly value="<?php echo strtoupper($SOO); ?>" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-default">
                    <span class="input-group-text"><strong>LGA:</strong></span>
                    <input type="text" class="form-control" readonly value="<?php echo strtoupper($LGA); ?>" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-default">
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