<?php 
include("includes/dbcon.php");

if(isset($_POST['add_intern'])) {
    $fname= $_POST['f_name'];
    $lname= $_POST['l_name'];
    $age= $_POST['age'];
    $Domain= $_POST['Domain'];
    $Start= $_POST['Start'];
    $End= $_POST['End'];


if($fname== "" || empty($fname)) {
    header('location:home.php?message=Please add the first name!');
}
else {
    $query= "insert into `interns` (`first_name`, `last_name`, `age`, `domain`, `start`, `end`) values ('$fname', '$lname', '$age', '$Domain', '$Start', '$End')"; 
    $result=mysqli_query($con, $query);
    if(!$result) {
        die ("Query Failed".mysqli_error());
    }
    else {
        header('location:home.php?insert_msg=Your data has been added successfully.');
    }
}


}