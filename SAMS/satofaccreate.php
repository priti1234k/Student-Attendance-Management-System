<?php
// Include config file
require_once "config.php";
$facid = $deptid = $cid = $sid =  "";
$facid_err = $deptid_err = $cid_err = $sid_err  =  "";
 
// Processing form data when form is submitted
if($_SERVER["REQUEST_METHOD"] == "POST"){
	
    $input_name = trim($_POST["facid"]);
    if(empty($input_name)){
        $facid_err = "Please enter a faculty id.";
    
    } else{
        $facid = $input_name;
    }
	$input_did = trim($_POST["deptid"]);
    if(empty($input_did)){
        $deptid_err = "Please enter a faculty id.";
    
    } else{
        $deptid = $input_did;
    }
	
	$input_cid = trim($_POST["cid"]);
    if(empty($input_cid)){
        $cid_err = "Please enter a faculty id.";
    
    } else{
        $cid = $input_cid;
    }
	$input_sid = trim($_POST["sid"]);
    if(empty($input_sid)){
        $sid_err = "Please enter a faculty id.";
    
    } else{
        $sid = $input_sid;
    }
	
    // Check input errors before inserting in database
    if(empty($facid_err) && empty($deptid_err) && empty($cid_err) && empty($sid_err)){
        // Prepare an insert statement
        $sql = "INSERT INTO tblallotstof (Fac_id , D_id , Course_id , subject_id ,  status) VALUES (? , ? , ? , ? , ? )";
         
        if($stmt = mysqli_prepare($conn, $sql)){
            // Bind variables to the prepared statement as parameters
            mysqli_stmt_bind_param($stmt , "sssss", $param_facid, $param_did, $param_cid, $param_sid,  $param_status);
            
            // Set parameters
			$param_facid = $facid;
            $param_did = $deptid;
			$param_cid = $cid;
			$param_sid = $sid;
            $param_status= 'Active';
           
            
            
            // Attempt to execute the prepared statement
            if(mysqli_stmt_execute($stmt)){
                // Records created successfully. Redirect to landing page
                header("location: satofactable.php");
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
	<label for="Did" >Faculty Name:</label>    
	
	<select name="facid" id="facid" class="form-control <?php echo (!empty($facid_err)) ? 'is-invalid' : ''; ?>" value="<?php echo $facid; ?>" style="text-align: left;" >
  <option disabled selected>-- Select  --</option>
    <?php
	
		
	
	
        $records = mysqli_query($conn, "SELECT Fac_id, facultyname From faculty_master WHERE status='active'");  // Use select query here 


        while($data = mysqli_fetch_array($records))
        {
		
            echo "<option value='". $data['Fac_id'] ."'>" .$data['facultyname'] ."</option>";  // displaying data in option menu
        }
		
    ?>  

  
  </select>	<span class="invalid-feedback"></span><br>
 	
	</div>
	<div class="form-group">
	<label for="Did" >Department Name:</label>    
	
	<select name="deptid" id="deptid" class="form-control <?php echo (!empty($deptid_err)) ? 'is-invalid' : ''; ?>" value="<?php echo $deptid; ?>" style="text-align: left;" >
  <option disabled selected>-- Select  --</option>
    <?php
	
		
	
	
        $records = mysqli_query($conn, "SELECT D_id, DeptName From dept_master WHERE status='active'");  // Use select query here 


        while($data = mysqli_fetch_array($records))
        {
		
            echo "<option value='". $data['D_id'] ."'>" .$data['DeptName'] ."</option>";  // displaying data in option menu
        }
		
    ?>  

  
  </select>	<span class="invalid-feedback"></span><br>
 	
	</div>
	<div class="form-group">
	<label for="Did" >Course Name:</label>    
	
	<select name="cid" id="cid" class="form-control <?php echo (!empty($cid_err)) ? 'is-invalid' : ''; ?>" value="<?php echo $cid; ?>" style="text-align: left;" >
  <option disabled selected>-- Select  --</option>
    <?php
	
		
	
	$deptid=$_POST["deptid"];
        $records = mysqli_query($conn, "SELECT Course_id, coursename From course_master WHERE status='active' AND D_id=$deptid");  // Use select query here 


        while($data = mysqli_fetch_array($records))
        {
		
            echo "<option value='". $data['Course_id'] ."'>" .$data['coursename'] ."</option>";  // displaying data in option menu
        }
		
    ?>  

  
  </select>	<span class="invalid-feedback"></span><br>
 	
	</div>
	<div class="form-group">
	<label for="Did" >Subject:</label>    
	
	<select name="sid" id="sid" class="form-control <?php echo (!empty($sid_err)) ? 'is-invalid' : ''; ?>" value="<?php echo $sid; ?>" style="text-align: left;" >
  <option disabled selected>-- Select  --</option>
    <?php
	
		
	
	
        $records = mysqli_query($conn, "SELECT subject_id, subjectname From subject_master WHERE status='active'");  // Use select query here 


        while($data = mysqli_fetch_array($records))
        {
		
            echo "<option value='". $data['subject_id'] ."'>" .$data['subjectname'] ."</option>";  // displaying data in option menu
        }
		
    ?>  

  
  </select>	<span class="invalid-feedback"></span><br>
 	
	</div>
	<div class="form-inline form-group">
<input type="submit" name="submit" value="Submit" class="btn btn-primary " >
	<input type="reset" name="clear" value="Clear" class="btn btn-primary"></div>
	</div>
	<div class="panel-footer">
	
	<a href="satofactable.php" class="btn btn-secondary ml-2">Cancel</a>
	</div>
	</div>
	
	</form>
	
	</div>
	</center>
	</div>
	
	</body>
	</html>