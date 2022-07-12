<?php
// Include config file
require_once "config.php";
 
// Define variables and initialize with empty values
$deptname =  "";
$deptname_err = "";

 
// Processing form data when form is submitted
if(isset($_POST["id"]) && !empty($_POST["id"])){
    // Get hidden input value
    $id = $_POST["id"];
    
    // Validate name
    $input_name = trim($_POST["deptname"]);
    if(empty($input_name)){
        $deptname_err = "Please enter valid name.";
    }  else{
        $deptname = $input_name;
    }
	

    // Check input errors before inserting in database
    if(empty($deptname_err) ){
        // Prepare an update statement
        $sql = "UPDATE dept_master SET DeptName=? WHERE D_id=?";
         
        if($stmt = mysqli_prepare($conn, $sql)){
            // Bind variables to the prepared statement as parameters
            mysqli_stmt_bind_param($stmt, "si", $param_name,   $param_id);
            
            // Set parameters
            $param_name = $deptname;
			
			
            $param_id = $id;
            
            // Attempt to execute the prepared statement
            if(mysqli_stmt_execute($stmt)){
                // Records updated successfully. Redirect to landing page
                header("location: depttable.php");
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
} else{
    // Check existence of id parameter before processing further
    if(isset($_GET["id"]) && !empty(trim($_GET["id"]))){
        // Get URL parameter
        $id =  trim($_GET["id"]);
        
        // Prepare a select statement
        $sql = "SELECT * FROM dept_master WHERE D_id = ?";
        if($stmt = mysqli_prepare($conn, $sql)){
            // Bind variables to the prepared statement as parameters
            mysqli_stmt_bind_param($stmt, "i", $param_id);
            
            // Set parameters
            $param_id = $id;
            
            // Attempt to execute the prepared statement
            if(mysqli_stmt_execute($stmt)){
                $result = mysqli_stmt_get_result($stmt);
    
                if(mysqli_num_rows($result) == 1){
                    /* Fetch result row as an associative array. Since the result set
                    contains only one row, we don't need to use while loop */
                    $row = mysqli_fetch_array($result, MYSQLI_ASSOC);
                    
                    // Retrieve individual field value
                    $deptname = $row["DeptName"];
                    
                
                } else{
                    // URL doesn't contain valid id. Redirect to error page
           
                    exit();
                }
                
            } else{
                echo "Oops! Something went wrong. Please try again later.";
            }
        }
        
        // Close statement
        mysqli_stmt_close($stmt);
        
        // Close connection
        mysqli_close($conn);
    }  else{
      
        exit();
    }
}
?>
 
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Update Record</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    		<script>
function Validate() {
dept=document.getElementById("deptname").value;
 var deptformat = /^[a-zA-Z0-9]/;
alert(dept);

if(dept.match(deptformat))
{

return true;
}
else
{
alert("You have entered an invalid name");

return false;
}



 
}</script>
	<style>
        .wrapper{
            width: 600px;
            margin: 0 auto;
        }
    </style>
</head>
<body>
    <div class="wrapper">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    
                   
				
	<h3>Update Account</h3>


	
                    <form onsubmit="return Validate();" action="<?php echo htmlspecialchars(basename($_SERVER['REQUEST_URI'])); ?>" method="POST">
                        <div class="form-group">
                            <label>Department Name</label>
                            <input type="text" name="deptname" id="deptname" class="form-control <?php echo (!empty($deptname_err)) ? 'is-invalid' : ''; ?>" value="<?php echo $deptname; ?>">
                            <span class="invalid-feedback"><?php echo $deptname_err;?></span>
                        </div>
						
        
                        <input type="hidden" name="id" value="<?php echo $id; ?>"/>
                        <input type="submit" class="btn btn-primary" value="Submit">
						
					
                        <a href="depttable.php" class="btn btn-secondary ml-2">Cancel</a>
						
                    </form>
                </div>
            </div>        
        </div>
    </div>
</body>
</html>