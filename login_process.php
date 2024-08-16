<?php include('dbcon.php');?>
<?php  session_start(); ?>

<?php 

if(isset($_POST['login'])){
    $username = $_POST['uname'];
    $password = $_POST['password'];
}

$query= "select * from `users` where `username`= '$username' and `password`= '$password'";
$result=mysqli_query($con, $query);

if(!$result) {
    die("Query Failed".mysqli_error($con));    
}
else{
    $row = mysqli_num_rows($result);
    echo $row;
    if($row==1){
        $_SESSION['uname']= $username;
        header('location:../home.php');
    }
    else{
        header('location:../index.php?message=Sorry your username/password is incorrect.');
    }

}
?>