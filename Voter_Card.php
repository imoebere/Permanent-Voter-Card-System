<?php session_start();
      include 'Backend/connect.php'; 
      $email2 = $_SESSION['red'];
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
    <title>PVC Card</title>
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
            <div style="overflow-x:auto;">
                  <?php
                      $select = "SELECT * FROM Voter_tbl where Email ='$email2'";
                      $query=mysqli_query($conn,$select);
                      $row_num = mysqli_num_rows($query);
                      while ($row=mysqli_fetch_assoc($query)){
                          $Date_Issue = $row ['Date_Issue'];
                          $VIN = $row ['VIN'];
                          $Name = $row ['Name'];
                          $DOB = $row ['DOB'];
                          $Gender = $row ['Gender'];
                          $Occupation = $row ['Occupation'];
                          $Resident = $row ['Resident'];
                          $Image = $row ['Image'];
                      }
                  ?>
                      <table>
                        <tr>
                          <th><img src="Img/coat.svg" alt="" class="img"></th>
                          <th colspan="4" style="text-align: center; color: hsl(140, 80%, 70%);">
                          <span class="badge bg-success"><h4>FEDERAL REPUBLIC OF NIGERIA <br> INDEPENDENT NATIONAL ELECTORAL COMMISSION <br/> VOTER'S CARD</h4></span></th>
                        </tr>
                        <tr>
                          <th>Issue Date:</th>
                          <td><strong><?php echo $Date_Issue; ?></strong></td>
                          <th>VIN:</th>
                          <td colspan="2"><strong><?php echo $VIN; ?></strong></td>
                        </tr>
                        <tr>
                          <td rowspan="5"><img src="<?php echo $Image;?>" alt="" class="img"></td>
                          <td>&nbsp;</td>
                          <td>&nbsp;</td>
                          <td>&nbsp;</td>
                        </tr>
                        <tr>
                          <th>Name:</th>
                          <td colspan="4"><strong><?php echo strtoupper($Name);?></strong></td>
                        </tr>
                        <tr>
                          <th>DATE OF BIRTH:</th>
                          <td><strong><?php echo $DOB;?></strong></td>
                          <th>GENDER:</th>
                          <td><strong><?php echo strtoupper($Gender);?></strong></td>
                        </tr>
                        <tr>
                          <th>OCCUPATION:</th>
                          <td colspan="4"><strong><?php echo strtoupper($Occupation);?></strong></td>
                        </tr>
                        <tr>
                          <th>ADDRESS:</th>
                          <td colspan="4"><strong><?php echo strtoupper($Resident);?></strong></td>
                        </tr>
                        <tr>
                          <td colspan="5"><span class="text-muted">&copy; 2022 Permanent Voter Card, Inc</span></td>
                        </tr>
                      </table>
            </div>
        </div>
  </div>
</div>



<!-- Bootstrap Javascript -->
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.5/dist/umd/popper.min.js" integrity="sha384-Xe+8cL9oJa6tN/veChSP7q+mnSPaj5Bcu9mPX5F5xIGE0DVittaqT5lorf0EI7Vk" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/js/bootstrap.min.js" integrity="sha384-kjU+l4N0Yf4ZOJErLsIcvOU2qSb74wXpOhqTvwVx3OElZRweTnQ6d31fXEoRD1Jy" crossorigin="anonymous"></script>

</body>
</html>