<?php
// Include config file
require_once "config.php";
$deptid = $course_id = $subjectname   =  "";
$depid_err = $courseid_err = $subjectname_err  =  "";
 
// Processing form data when form is submitted
if($_SERVER["REQUEST_METHOD"] == "POST"){
	
    $input_name = trim($_POST["deptid"]);
    if(empty($input_name)){
        $deptid_err = "Please enter a depatment id.";
    
    } else{
        $deptid = $input_name;
    }
	// Validate email
	$input_courseid = trim($_POST["courseid"]);
    if(empty($input_courseid)){
        $courseid_err = "Please enter an course name.";     
    } else{
        $courseid = $input_courseid;
    }

    
    
    
	// Validate year or semester
    $input_subjectname = trim($_POST["subjectname"]);
    if(empty($input_subjectname)){
        $subjectname_err = "Please enter year or semester.";     
    } else{
        $subjectname = $input_subjectname;
    }
	
	 
	
    // Check input errors before inserting in database
    if(empty($deptid_err) && empty($coursename_err) && empty($yors_err) && empty($year_err)){
        // Prepare an insert statement
        $sql = "INSERT INTO subject_master (D_id , Course_id , subjectname ,  status) VALUES ( ? , ? , ? , ? )";
         
        if($stmt = mysqli_prepare($conn, $sql)){
            // Bind variables to the prepared statement as parameters
            mysqli_stmt_bind_param($stmt , "ssss", $param_did, $param_courseid, $param_sn, $param_status);
            
            // Set parameters
            $param_did = $deptid;
			 $param_courseid = $courseid;
			  $param_sn = $subjectname;
         
            $param_status= 'Active';
           
            
            
            // Attempt to execute the prepared statement
            if(mysqli_stmt_execute($stmt)){
                // Records created successfully. Redirect to landing page
                header("location: subjecttable.php");
                exit();
            } else{
                echo "Oops! Something went wrong. Please try again later.";
            }
        }
         
        // Close statement
        mysqli_stmt_close($stmt);
    }
    
    // Close connection
    mysqli_close($conn);
}
?>
<html>
    <head>
        
        <title>Welcome to Faculty</title>
		<link href="css/bootstrap.min.css" rel="stylesheet">
        <script src="js/jquery.js"></script>
        <script src="js/bootstrap.min.js"></script>
		
		<style type="text/css">
.a{
width:100%;
background-color:#ccc ;
height:150%;
padding:5%;

}
.b{
   width:40%;
    background-color:#fff;
	border:2px solid black;
  
}

</style>
    </head>
	
	<body>
	
	<div class="a">
	<center>
	<div class="b">
	<form style="padding:5%" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
	<div class="panel panel-default">
	<div class="panel-heading">
	<h2 class="mt-5">Create Record</h2>
                    
	</div>
	<div class="panel-body">
	<div class="form-group">
	<label for="Did" >Department Id:</label>    
	
	<select name="deptid" id="deptid" class="form-control <?php echo (!empty($deptid_err)) ? 'is-invalid' : ''; ?>" value="<?php echo $deptid; ?>" style="text-align: left;" >
  <option disabled selected>-- Select  --</option>
    <?php
        $records = mysqli_query($conn, "SELECT D_id From dept_master WHERE status='active'");  // Use select query here 

        while($data = mysqli_fetch_array($records))
        {
            echo "<option value='". $data['D_id'] ."'>" .$data['D_id'] ."</option>";  // displaying data in option menu
        }	
    ?>  

  
  </select>	<span class="invalid-feedback"></span><br>
 	
	</div>
	<div class="panel-body">
	<div class="form-group">
	<label for="cid" >Course Id:</label>    
	
	<select name="courseid" id="courseid" class="form-control <?php echo (!empty($courseid_err)) ? 'is-invalid' : ''; ?>" value="<?php echo $courseid; ?>" style="text-align: left;" >
  <option disabled selected>-- Select  --</option>
    <?php
        $records = mysqli_query($conn, "SELECT Course_id From course_master WHERE status='active'");  // Use select query here 

        while($data = mysqli_fetch_array($records))
        {
            echo "<option value='". $data['Course_id'] ."'>" .$data['Course_id'] ."</option>";  // displaying data in option menu
        }	
    ?>  

  
  </select>	<span class="invalid-feedback"></span><br>
 	
	</div>
	<div class="form-group">
	<input type="text" name="subjectname" placeholder="Enter subject name" class="form-control <?php echo (!empty($subjectname_err)) ? 'is-invalid' : ''; ?>" value="<?php echo $subjectname; ?>" >
	<span class="invalid-feedback"><?php echo $subjectname_err;?></span></div>
	<div class="form-group">
	
<input type="submit" name="submit" value="Submit" class="btn btn-primary " >
	<input type="reset" name="clear" value="Clear" class="btn btn-primary"></div>
	</div>
	<div class="panel-footer">
	
	<a href="subjecttable.php" class="btn btn-secondary ml-2">Cancel</a>
	</div>
	</div>
	
	</form>
	
	</div>
	</center>
	</div>
	
	</body>
	</html>