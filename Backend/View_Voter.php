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
    <link href="style.css" rel="stylesheet">
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
            $select = "SELECT * FROM Voter_tbl";
            $query=mysqli_query($conn,$select);
            $row_num = mysqli_num_rows($query);
            while ($row=mysqli_fetch_array($query)){
                $id[] = $row ['id'];
                $Image[] = $row ['Image'];
                $Name[] = $row ['Name'];
                $Email[] = $row ['Email'];
                $Gender[] = $row ['Gender'];
                $DOB[] = $row ['DOB'];
                $Resident[] = $row ['Resident'];
                $SOO[] = $row ['SOO'];
                $LGA[] = $row ['LGA'];
                $Permanent[] = $row ['Permanent'];
                $Occupation[] = $row ['Occupation'];
                $Phone[] = $row ['Phone'];
                $Office[] = $row ['Office'];
                $VIN[] = $row ['VIN'];
                $Date_Issue[] = $row ['Date_Issue'];
                $datess[] = $row ['datess'];
            }
        ?>
        
        <div class="col-md-3 col-lg-3">
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
        <div class="col-md-9 col-lg-9">
            <div style="overflow-x:auto;">
                    <table style="border:1px solid dark;">
                        <tr>
                            <th>S/N</th>
                            <th>PASSPORT</th>
                            <th>NAME</th>
                            <th>EMAIL</th>
                            <th>GENDER</th>
                            <th>DATE OF BIRTH</th>
                            <th>RESIDENT ADDRESS</th>
                            <th>STATE OF ORIGIN</th>
                            <th>LGA</th>
                            <th>PERMANENT ADDRESS</th>
                            <th>OCCUPATION</th>
                            <th>TELEPHONE</th>
                            <th>OFFICE ADDRESS</th>
                            <th>VOTER IDENTIFICATION NUMBER</th>
                            <th>DATE ISSUE</th>
                            <th>DATE/TIME</th>
                        </tr>
                        <?php for($i=0; $i<$row_num; $i++){ ?>
                        <tr>
                            <td><?php echo $i+1; ?></td>
                            <td><img src="../<?php echo $Image[$i]; ?>" alt="" height="100px" width="100px"></td>
                            <td><?php echo $Name[$i]; ?></td>
                            <td><?php echo $Email[$i]; ?></td>
                            <td><?php echo $Gender[$i]; ?></td>
                            <td><?php echo $DOB[$i]; ?></td>
                            <td><?php echo $Resident[$i]; ?></td>
                            <td><?php echo $SOO[$i]; ?></td>
                            <td><?php echo $LGA[$i]; ?></td>
                            <td><?php echo $Permanent[$i]; ?></td>
                            <td><?php echo $Occupation[$i]; ?></td>
                            <td><?php echo $Phone[$i]; ?></td>
                            <td><?php echo $Office[$i]; ?></td>
                            <td><?php echo $VIN[$i]; ?></td>
                            <td><?php echo $Date_Issue[$i]; ?></td>
                            <td><?php echo $datess[$i]; ?></td>
                        </tr>
                        <?php }?>
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