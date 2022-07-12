<?php
// Include config file
require_once "config.php";
 
// Define variables and initialize with empty values
$sem=  "";
$sem_err =  "";
 
// Processing form data when form is submitted
if($_SERVER["REQUEST_METHOD"] == "POST"){
	
    $input_name = trim($_POST["sem"]);
    if(empty($input_name)){
        $sem_err = "Please enter vaild year.";
    } else{
        $sem = $input_name;
    }
	

    
	
    // Check input errors before inserting in database
    if(empty($sem_err)){
        // Prepare an insert statement
        $sql = "INSERT INTO sem_master (Sem , status) VALUES (?  ,?)";
         
        if($stmt = mysqli_prepare($conn, $sql)){
            // Bind variables to the prepared statement as parameters
            mysqli_stmt_bind_param($stmt , "ss", $param_sem, $param_status);
            
            // Set parameters
            $param_sem = $sem;
			  $param_status = 'active';
          
            
            
            // Attempt to execute the prepared statement
            if(mysqli_stmt_execute($stmt)){
                // Records created successfully. Redirect to landing page
                header("location: semtable.php");
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
        
        <title>Welcome to department</title>
		<link href="css/bootstrap.min.css" rel="stylesheet">
        <script src="js/jquery.js"></script>
        <script src="js/bootstrap.min.js"></script>
		
		<script>
function Validate() {
sem=document.getElementById("sem").value;
var semformat = /^[a-z0-9]/;
alert(sem);

if(sem.match(semformat) )
{

return true;
}
else
{
alert("You have entered an invalid semester");

return false;
}



 
}</script>
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
	<form style="padding:5%"  action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post" name="deptform" onsubmit="return Validate();">
	<div class="panel panel-default">
	<div class="panel-heading">
	<h2 class="mt-5">Create New semester</h2>
                    
	</div>
	<div class="panel-body">
	<div class="form-group">
	<input type="text" id="sem" name="sem"  placeholder="Enter semester " class="form-control " value="" >
	 <span class="invalid-feedback"></span>
                        </div>
						
</div>
	<div class="form-inline form-group">
<input type="submit" name="submit" value="Submit" class="btn btn-primary " >
	<input type="reset" name="clear" value="Clear" class="btn btn-primary"></div>
	</div>
	<div class="panel-footer">
	
	<a href="semtable.php" class="btn btn-secondary ml-2">Cancel</a>
	</div>
	</div>
		
	</form>
	
	</div>
	</center>
	</div>

	</body>
	</html>