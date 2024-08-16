<?php include("header.php");?>
<?php include("includes/dbcon.php");?>

        <?php 
        if(isset($_GET['id'])) {
            $id = $_GET['id'];
        
        $query = "SELECT * FROM `interns` where `id`= '$id'";
        $result = mysqli_query($con, $query);

        if(!$result) {
          die("Query Failed".mysqli_error(  $con));
        }
        else {

            $row = mysqli_fetch_assoc($result);

       
        }
        
    }   
        ?>
        <?php 
            if(isset($_POST['update_intern'])) {
             
            if(isset($_GET['id_new']))    {
                $idnew= $_GET['id_new'];
            }
            $fname= $_POST['f_name'];
            $lname= $_POST['l_name'];
            $age=   $_POST['age'];
            $Domain= $_POST['Domain'];
            $Start= $_POST['Start'];
            $End= $_POST['End'];


            
            $query= "update `interns` set `first_name`= '$fname', `last_name`= '$lname', `age`= '$age', `domain`='$Domain', `Start`= '$Start', `End`= '$End' where `id`= '$idnew'  ";
            $result = mysqli_query($con, $query);

            if(!$result) {
              die("Query Failed".mysqli_error(  $con));
            }
            else{
                header('location:home.php?update_msg=You have successfully updated your data.');
            }
            }
        ?>

        <form action="update_page_1.php?id_new=<?php echo $id; ?>" method="post">
        <div class="form-group">
            <label>First Name</label>
            <input type="text" name="f_name"class= "form-control" value="<?php echo $row['first_name']?>">  
          </div>
          <div class="form-group">
            <label>Last Name</label>
            <input type="text" name="l_name"class= "form-control" value="<?php echo $row['last_name']?>">  
          </div>
          <div class="form-group">
            <label>Age</label>
            <input type="text" name="age"class= "form-control" value="<?php echo $row['age']?>">  
          </div>
          <div class="form-group">
            <label>Domain</label>
            <input type="text" name="Domain"class= "form-control" value="<?php echo $row['Domain']?>">  
          </div><div class="form-group">
            <label>Start</label>
            <input type="date" name="Start"class= "form-control" value="<?php echo $row['Start']?>">  
          </div><div class="form-group">
            <label>End</label>
            <input type="date" name="End"class= "form-control" value="<?php echo $row['End']?>">  
          </div>
          <input type="submit" class="btn btn-success" name="update_intern" value="UPDATE">
          </form>



<?php include("footer.php");?>
