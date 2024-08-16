<?php include("header.php");?>
<?php include("includes/dbcon.php");?>

<?php session_start();
?>
<?php
    if(isset($_SESSION['uname'])) {
        echo "<h2> Hey there! ".$_SESSION['uname']."</h2>";
    }
    else{
        header('location:index.php?message=You need to login first.');
    }

?>
<a href="includes/logout_process.php" class="btn btn-danger">LOGOUT</a>
    <div class="box1">
        <!-- Button trigger modal -->
    <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal">Add New</button>
        </div>

        <table class="table table-hover table-bordered table-striped">
        <thead>
            <tr>
            <th>ID</th>
            <th>First Name</th>
            <th>Last Name</th>
            <th>Age</th>
            <th>Domain</th>

            <th>Start</th>
            <th>End</th>

            <th>View</th>
            <th>Update</th>
            <th>Send</th>
            <th>Delete</th>
            <th>Download</th>
            </tr>
        </thead>
        <tbody>
            <?php 
            $query = "SELECT * FROM `interns` ";
            $result = mysqli_query($con, $query);

            if(!$result) {
            die("Query Failed".mysqli_error(  $con));
            }
            else {
            while($row = mysqli_fetch_assoc($result)) {

                ?>
            <tr>
            <td class="intern_id"><?php echo $row['id']; ?></td>
            <td><?php echo $row['first_name']; ?></td>
            <td><?php echo $row['last_name']; ?></td>
            <td><?php echo $row['age']; ?></td>
            <td><?php echo $row['Domain']; ?></td>
            <td><?php echo $row['Start']; ?></td>
            <td><?php echo $row['End']; ?></td>

            <td><a href="#" class="btn btn-info view_btn">View</a></td>
            <td><a href="update_page_1.php?id=<?php echo $row['id']; ?>" class="btn btn-success">Update</a></td>
            <td><a href="send_page.php?id=<?php echo $row['id']; ?>" class="btn btn-secondary">Send</a></td>
            <td><a href="delete_page.php?id=<?php echo $row['id']; ?>" class="btn btn-danger">Delete</a></td>
            <td><a href="download_page.php?id=<?php echo $row['id']; ?>&ACTION=DOWNLOAD" class="btn btn-warning">Download</a></td>




                </tr>
                <?php
                
            }
            }
            ?>
            
        </tbody>
            </table>
            <?php 
            if(isset($_GET['message'])) {
                echo "<h6>".$_GET['message']."</h6>";
            }
        ?>
        <?php 
    if(isset($_GET['insert_msg'])) {
        echo "<h5>".$_GET['insert_msg']."</h5>";
    }
        ?>
        <?php 
    if(isset($_GET['update_msg'])) {
        echo "<h5>".$_GET['update_msg']."</h5>";
    }
        ?>
        <?php 
    if(isset($_GET['delete_msg'])) {
        echo "<h5>".$_GET['delete_msg']."</h5>";
        }
        ?>

    <!-- ADD Modal -->
    <form action="insert_data.php" method="post">
        <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">New Intern</h5>
                    <button type="button" class="close" data-dismiss="modal"        aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                    </button>
                </div>
            <div class="modal-body">

                    <div class="form-group">
                        <label>First Name</label>
                        <input type="text" name="f_name"class= "form-control">  
                    </div>
                    <div class="form-group">
                        <label>Last Name</label>
                        <input type="text" name="l_name"class= "form-control">  
                    </div>
                    <div class="form-group">
                        <label>Age</label>
                        <input type="text" name="age"class= "form-control">  
                    </div>
                    <div class="form-group">
                        <label>Domain</label>
                        <input type="text" name="Domain"class= "form-control">  
                            <datalist id="domain-list">
                                <option value="Web Development">
                                <option value="Artificial Intelligence">
                                <option value="Volunteer">
                                <option value="Data Science">
                                <option value="Digital Marketing">
                            </datalist>
                    </div>
                    <div class="form-group">
                        <label>Start</label>
                        <input type="date" name="Start"class= "form-control">  
                    </div>
                    <div class="form-group">
                        <label>End</label>
                        <input type="date" name="End"class= "form-control">  
                    </div>
            
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <input type="submit" class="btn btn-success" name="add_intern" value="ADD">
            </div>
        </div>
    </div>
    </div>
  
    



    
    </form>
    <!--view modal-->
    <div class="modal fade" id="internviewModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Intern Details</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <div class= "intern-viewing-modal"></div>
      </div>
      <div class="modal-footer">
       
        <button type="button" class="btn btn-primary">Done</button>
      </div>
    </div>
  </div>
</div>
    <?php include("footer.php");?>
