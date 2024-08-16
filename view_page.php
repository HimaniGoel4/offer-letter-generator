<?php include("includes/dbcon.php"); 

if(isset($_POST['checking_viewbtn'])){
    $i_id= $_POST['intern_id'];
    $query= "SELECT * from interns where id= '$i_id' ";
        $query_run= mysqli_query($con,$query);
        if (mysqli_num_rows($query_run)>0){

                foreach($query_run as $row)
                {echo $return= '
                                <h5> ID: '.$row['id'].'</h5>
                                <h5> First Name: '.$row['first_name'].'</h5>
                                <h5> Last Name: '.$row['last_name'].'</h5>
                                <h5> Age: '.$row['age'].'</h5>
                                <h5> Domain: '.$row['Domain'].'</h5>
                                <h5> Start: '.$row['Start'].'</h5>
                                <h5> End: '.$row['End'].'</h5>';
                                


                }
}
else{
    echo $return= "<h5>No Record Found</h5>";
}

}