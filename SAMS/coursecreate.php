<?php
// Include config file
require_once "config.php";
$deptid = $coursename = $yors  = $year =  "";
$depid_err = $coursename_err = $yors_err = $year_err  =  "";
 
// Processing form data when form is submitted
if($_SERVER["REQUEST_METHOD"] == "POST"){
	
    $input_name = trim($_POST["deptid"]);
    if(empty($input_name)){
        $deptid_err = "Please enter a depatment id.";
    
    } else{
        $deptid = $input_name;
    }
	// Validate email
	$input_coursename = trim($_POST["coursename"]);
    if(empty($input_coursename)){
        $coursename_err = "Please enter an course name.";     
    } else{
        $coursename = $input_coursename;
    }

    
    
    
	// Validate year or semester
    $input_yors = trim($_POST["yors"]);
    if(empty($input_yors)){
        $yors_err = "Please enter year or semester.";     
    } else{
        $yors = $input_yors;
    }
	// Validate year
    $input_year = trim($_POST["year"]);
    if(empty($input_year)){
        $year_err = "Please enter year.";     
    } else{
        $year = $input_year;
    } 
	 
	
    // Check input errors before inserting in database
    if(empty($deptid_err) && empty($coursename_err) && empty($yors_err) && empty($year_err)){
        // Prepare an insert statement
        $sql = "INSERT INTO course_master (D_id , coursename , yearorsem , year ,  status) VALUES (? , ? , ? , ? , ? )";
         
        if($stmt = mysqli_prepare($conn, $sql)){
            // Bind variables to the prepared statement as parameters
            mysqli_stmt_bind_param($stmt , "sssss", $param_did, $param_coursename, $param_yors, $param_year,  $param_status);
            
            // Set parameters
            $param_did = $deptid;
			 $param_coursename = $coursename;
			  $param_yors = $yors;
            $param_year = $year;
            $param_status= 'Active';
           
            
            
            // Attempt to execute the prepared statement
            if(mysqli_stmt_execute($stmt)){
                // Records created successfully. Redirect to landing page
                header("location: coursetable.php");
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
	
		
	
	
        $records = mysqli_query($conn, "SELECT D_id, DeptName From dept_master WHERE status='active'");  // Use select query here 


        while($data = mysqli_fetch_array($records))
        {
		
            echo "<option value='". $data['D_id'] ."'>" .$data['DeptName'] ."</option>";  // displaying data in option menu
        }
		
    ?>  

  
  </select>	<span class="invalid-feedback"></span><br>
 	
	</div>
	<div class="form-group">
	<input type="text" name="coursename" placeholder="Enter course name" class="form-control <?php echo (!empty($coursename_err)) ? 'is-invalid' : ''; ?>" value="<?php echo $coursename; ?>" >
	<span class="invalid-feedback"><?php echo $coursename_err;?></span></div>
	<div class="form-group">
	<label for="yors" >year or semester:</label>  
	<select name="yors" id="yors" class="form-control <?php echo (!empty($yors_err)) ? 'is-invalid' : ''; ?>" value="<?php echo $yors; ?>" style="text-align: left;" >
   <option disabled selected>-- Select  --</option>
   
  <option value="Year">Year</option>
 <option value="Semester">Semester</option>

  </select>	<span class="invalid-feedback"><?php echo $yors_err;?></span>
	</div>
	<div class="form-group">
	  
	
	<select name="year" id="year" class="form-control <?php echo (!empty($year_err)) ? 'is-invalid' : ''; ?>" value="<?php echo $year; ?>" style="text-align: left;" >
  <option disabled selected>-- Select  --</option>
    <?php
	
		
	$yors=$_POST['yors'];
	
        
        if($yors==Year){
			$records = mysqli_query($conn, "SELECT Y_id, Year From year_master WHERE status='active'");  // Use select query here 

        while($data = mysqli_fetch_array($records))
        {
		
            echo "<option value='". $data['Y_id'] ."'>" .$data['Year'] ."</option>";  // displaying data in option menu
        }
		}
		else{
			$records = mysqli_query($conn, "SELECT S_id, Sem From sem_master WHERE status='active'");  // Use select query here 
           while($data = mysqli_fetch_array($records))
        {
		
            echo "<option value='". $data['S_id'] ."'>" .$data['Sem'] ."</option>";  // displaying data in option menu
        }
		}
    ?>  

  
  </select>	<span class="invalid-feedback"></span><br>
 	
	</div>
	<div class="form-inline form-group">
<input type="submit" name="submit" value="Submit" class="btn btn-primary " >
	<input type="reset" name="clear" value="Clear" class="btn btn-primary"></div>
	</div>
	<div class="panel-footer">
	
	<a href="coursetable.php" class="btn btn-secondary ml-2">Cancel</a>
	</div>
	</div>
	
	</form>
	
	</div>
	</center>
	</div>
	
	</body>
	</html>