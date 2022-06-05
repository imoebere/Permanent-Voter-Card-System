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
                <a class="navbar-brand" href="#"> 
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
                $Age = $row ['Age'];
                $Email = $row ['Email'];
                $passport = $row ['Image'];
                $_SESSION['image'] = $passport;
            }
        ?>
        
        <div class="col-lg-4 col-md-4">
                <ul class="nav flex-column">
                    <li class="nav-item">
                        <img src="<?php echo $passport; ?>" alt="Passport" height="200px" width="150px"><br/>
                        <strong><?php echo "Name:  ". strtoupper($name); ?></strong><br/>
                        <strong><?php echo "Age:  ". $Age; ?></strong>
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
        <div class="col">
            <form method="post" enctype="multipart/form-data" class="p-4  border rounded-3 bg-light">
                <div class="input-group mb-3">
                    <span class="input-group-text" id="inputGroup-sizing-default"><strong>Full Name:</strong></span>
                    <input type="text" class="form-control" readonly name="name" value="<?php echo strtoupper($name); ?>"aria-label="Sizing example input" aria-describedby="inputGroup-sizing-default">
                    <span class="input-group-text" id="inputGroup-sizing-default"><strong>Email:</strong></span>
                    <input type="text" class="form-control" readonly name="email" value="<?php echo $Email; ?>"aria-label="Sizing example input" aria-describedby="inputGroup-sizing-default">
                </div>
                <div class="input-group mb-3">
                    <label class="input-group-text" for="inputGroupSelect01"><strong>Gender:</strong></label>
                    <select class="form-select" name="gender" required id="inputGroupSelect01">
                        <option selected>Choose...</option>
                        <option value="Male">Male</option>
                        <option value="Female">Female</option>
                    </select>
                    <span class="input-group-text" id="inputGroup-sizing-default"><strong>Date of Birth:</strong></span>
                    <input type="date" class="form-control"  required name="dob" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-default">
                </div>
                <div class="input-group mb-3">
                    <span class="input-group-text"><strong>Resident Address:</strong></span>
                    <textarea class="form-control" row="3" required name="R_address"aria-label="With textarea"></textarea>
                </div>
                <div class="input-group mb-3">
                    <label class="input-group-text" for="inputGroupSelect01"><strong>State Of Origin:</strong></label>
                    <select class="form-select" name="state" required id="inputGroupSelect01">
                        <option selected>Choose...</option>
                        <option value="Abia">Abia</option>
                        <option value="Adamawa">Adamawa</option>
                        <option value="Akwa Ibom">Akwa Ibom</option>
                        <option value="Anambra">Anambra</option>
                        <option value="Bauchi">Bauchi</option>
                        <option value="Bayelsa">Bayelsa</option>
                        <option value="Benue">Benue</option>
                        <option value="Borno">Borno</option>
                        <option value="Cross River">Cross River</option>
                        <option value="Delta">Delta</option>
                        <option value="Ebonyi">Ebonyi</option>
                        <option value="Edo">Edo</option>
                        <option value="Ekiti">Ekiti</option>
                        <option value="Enugu">Enugu</option>
                        <option value="FCT">Federal Capital Territory</option>
                        <option value="Gombe">Gombe</option>
                        <option value="Imo">Imo</option>
                        <option value="Jigawa">Jigawa</option>
                        <option value="Kaduna">Kaduna</option>
                        <option value="Kano">Kano</option>
                        <option value="Katsina">Katsina</option>
                        <option value="Kebbi">Kebbi</option>
                        <option value="Kogi">Kogi</option>
                        <option value="Kwara">Kwara</option>
                        <option value="Lagos">Lagos</option>
                        <option value="Nasarawa">Nasarawa</option>
                        <option value="Niger">Niger</option>
                        <option value="Ogun">Ogun</option>
                        <option value="Ondo">Ondo</option>
                        <option value="Osun">Osun</option>
                        <option value="Oyo">Oyo</option>
                        <option value="Plateau">Plateau</option>
                        <option value="Rivers">Rivers</option>
                        <option value="Sokoto">Sokoto</option>
                        <option value="Taraba">Taraba</option>
                        <option value="Yobe">Yobe</option>
                        <option value="Zamfara">Zamfara</option>
                    </select>
                    <span class="input-group-text" id="inputGroup-sizing-default"><strong>LGA:</strong></span>
                    <input type="text" class="form-control" name="LGA" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-default">
                </div>
                <!--<div class="input-group mb-3">
                    <label class="input-group-text" for="inputGroupSelect01">LGA:</label>
                    <select class="form-select" name="Abia_LGA" required id="inputGroupSelect01">
                        <option selected>Choose...</option>
                        <option value="Aba North">Aba North</option>
                        <option value="Aba South">Aba South</option>
                        <option value="Arochukwu">Arochukwu</option>
                        <option value="Bende">Bende</option>
                        <option value="Ikwuano">Ikwuano</option>
                        <option value="Isiala Ngwa North">Isiala Ngwa North</option>
                        <option value="Isiala Ngwa South">Isiala Ngwa South</option>
                        <option value="Isiukwuato">Isiukwuato</option>
                        <option value="Obi Ngwa">Obi Ngwa</option>
                        <option value="Ohafia">Ohafia</option>
                        <option value="Osisioma Ngwa">Osisioma Ngwa</option>
                        <option value="Ugwunagbo">Ugwunagbo</option>
                        <option value="Ukwa East">Ukwa East</option>
                        <option value="Ukwa West">Ukwa West</option>
                        <option value="Umuahia North">Umuahia North</option>
                        <option value="Umuahia South">Umuahia South</option>
                        <option value="Umunneochi">Umunneochi</option>
                    </select>
                </div>-->
                <div class="input-group mb-3">
                    <span class="input-group-text"><strong>Permanent Address:</strong></span>
                    <textarea class="form-control" row="3" required name="P_address"aria-label="With textarea"></textarea>
                </div>
                <div class="input-group mb-3">
                    <span class="input-group-text"><strong>Occupation:</strong></span>
                    <input type="text" class="form-control" name="occupation" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-default">
                    <span class="input-group-text"><strong>Telephone:</strong></span>
                    <input type="number" class="form-control" name="phone" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-default">
                </div>
                <div class="input-group mb-3">
                    <span class="input-group-text"><strong>Office Address:</strong></span>
                    <textarea class="form-control" row="3" required name="O_address"aria-label="With textarea"></textarea>
                </div>
                <div class="input-group mb-3">
                    <button type="submit" class="w-100 btn btn-lg btn-success" name="Submit">Submit</button>
                </div>
                <?php 
                  if (isset($_POST['Submit'])){
                    $image = $_SESSION['image'];
                    $name = trim($_POST['name']);
                    $email = trim(strtolower($_POST['email']));
                    $_SESSION['red'] = $email;
                    $gender = trim($_POST['gender']);
                    $dob = trim($_POST['dob']);
                    $R_address = trim($_POST['R_address']);
                    $state = trim($_POST['state']);
                    $LGA = trim($_POST['LGA']);
                    $P_address = trim($_POST['P_address']);
                    $occupation = trim($_POST['occupation']);
                    $phone = trim($_POST['phone']);
                    $O_address = trim($_POST['O_address']);
                    $vin = (rand(921,231).chr(rand(65, 90)).chr(rand(90, 65)).'-'.rand(9999, 2468).'-'.rand(123, 321));
                    $date_issue = date("d-m-Y");
                    $select = "SELECT * FROM Voter_tbl where Email ='$email'";
                    $query=mysqli_query($conn,$select);
                    $row_num = mysqli_num_rows($query);
                    if ($row_num>0){
                        echo '<script type="text/javascript">alert("Your Have already registered")</script>'.'<br>';
                        echo"<META http-equiv='refresh' content='0;URL=Voter_Card.php'>";
                    }else{
                      $insert = "INSERT INTO Voter_tbl (Image,Name,Email,Gender,DOB,Resident,SOO,LGA,Permanent,Occupation,Phone,Office,VIN,Date_Issue)
                      VALUES('$image','$name','$email','$gender','$dob','$R_address','$state','$LGA','$P_address','$occupation','$phone','$O_address','$vin','$date_issue')";
                      $result=mysqli_query($conn,$insert);
                      if ($insert){
                        echo"<META http-equiv='refresh' content='0;URL=Voter_Card.php'>";
                      }
                    }
                }
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