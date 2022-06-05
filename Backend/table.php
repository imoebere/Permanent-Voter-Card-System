<?php 
include ('connect.php'); 

//Sign Up table 
$Reg_tbl = "create table Reg_tbl (
    id int not null AUTO_INCREMENT PRIMARY KEY,
    Image VARCHAR(100) not null,
    Last_Name VARCHAR(100) not null,
    First_Name VARCHAR(100) not null,
    Middle_Name VARCHAR(100) not null,
    Age VARCHAR(3) not null,
    Email VARCHAR(50) not null,
    pwd VARCHAR(15) NOT NULL,
    datess TIMESTAMP
    )";
if (mysqli_query($conn, $Reg_tbl)) {
    echo "Sign Up Table created successfully"."</br>";
} else {
    echo "Error creating Sign Up table: "."</br>" . mysqli_error($conn);
}
$Log_Tbl = "create table Log_Tbl (
    id int not null AUTO_INCREMENT PRIMARY KEY,
    Email VARCHAR(50) not null,
    pwd VARCHAR(15) NOT NULL,
    datess TIMESTAMP
    )";
    
if (mysqli_query($conn, $Log_Tbl)) {
    echo "Log In table created successfully"."</br>";
} else {
    echo "Error creating LogIn table: "."</br>" . mysqli_error($conn);
}
//Message table 
$Contact_tbl = "create table Contact_tbl (
    id int not null AUTO_INCREMENT PRIMARY KEY,
    Name VARCHAR(150) not null,
    Email VARCHAR(50) not null,
    Phone VARCHAR(15) NOT NULL,
    subject VARCHAR(15) NOT NULL,
    Message VARCHAR(200) NOT NULL,
    datess TIMESTAMP
    )";
if (mysqli_query($conn, $Contact_tbl)) {
    echo "Contact Table created successfully"."</br>";
} else {
    echo "Error creating Contact table: "."</br>" . mysqli_error($conn);
}
//Voter table 
$Voter_tbl = "create table Voter_tbl (
    id int not null AUTO_INCREMENT PRIMARY KEY,
    Image VARCHAR(100) not null,
    Name VARCHAR(150) not null,
    Email VARCHAR(50) not null,
    Gender VARCHAR(7) NOT NULL,
    DOB DATE NOT NULL,
    Resident VARCHAR(200) NOT NULL,
    SOO VARCHAR(20) NOT NULL,
    LGA VARCHAR(20) NOT NULL,
    Permanent VARCHAR(200) NOT NULL,
    Occupation VARCHAR(100) NOT NULL,
    Phone VARCHAR(12) NOT NULL,
    Office VARCHAR(200) NOT NULL,
    VIN VARCHAR(100) NOT NULL,
    Date_Issue DATE NOT NULL,
    datess TIMESTAMP
    )";
if (mysqli_query($conn, $Voter_tbl)) {
    echo "Voter Table created successfully"."</br>";
} else {
    echo "Error creating Voter table: "."</br>" . mysqli_error($conn);
}
//staff table 
$staff_tbl = "create table staff_tbl (
    id int not null AUTO_INCREMENT PRIMARY KEY,
    User_id VARCHAR(15) not null,
    Name VARCHAR(150) not null,
    Email VARCHAR(50) not null,
    Phone VARCHAR(12) NOT NULL,
    pwd VARCHAR(100) NOT NULL,
    datess TIMESTAMP
    )";
if (mysqli_query($conn, $staff_tbl)) {
    echo "Staff Table created successfully"."</br>";
} else {
    echo "Error creating Staff table: "."</br>" . mysqli_error($conn);
}
//Admin table
$Admin_tbl = "create table Admin_tbl (
    id int not null AUTO_INCREMENT PRIMARY KEY,
    username VARCHAR(50) NOT NULL,
    password VARCHAR(50) NOT NULL,
    datess TIMESTAMP
    )";
    $insert="INSERT INTO Admin_tbl (username,password)VALUES('Adminadmin','adminAdmin200')";
    $check=mysqli_query($conn, $insert);
    if (mysqli_query($conn, $Admin_tbl)) {
        echo "Admin Table created successfully";
    } else {
        echo "Error creating table: "."</br>" . mysqli_error($conn);
    }
    $sqltr="SELECT * FROM Admin_tbl WHERE username='Adminadmin' and password='adminAdmin200'";
    $resultr=mysqli_query($conn,$sqltr);
    //$countre=mysqli_num_rows($resultr);

    
mysqli_close($conn);

?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Table Creation</title>
</head>

<body>
</body>
</html>