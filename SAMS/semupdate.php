<?php
// Include config file
require_once "config.php";
 
// Define variables and initialize with empty values
$sem =  "";
$sem_err = "";

 
// Processing form data when form is submitted
if(isset($_POST["id"]) && !empty($_POST["id"])){
    // Get hidden input value
    $id = $_POST["id"];
    
    // Validate name
    $input_name = trim($_POST["sem"]);
    if(empty($input_name)){
        $sem_err = "Please enter valid sem.";
    }  else{
        $sem = $input_name;
    }
	

    // Check input errors before inserting in database
    if(empty($sem_err) ){
        // Prepare an update statement
        $sql = "UPDATE sem_master SET Sem=? WHERE S_id=?";
         
        if($stmt = mysqli_prepare($conn, $sql)){
            // Bind variables to the prepared statement as parameters
            mysqli_stmt_bind_param($stmt, "si", $param_sem,   $param_id);
            
            // Set parameters
            $param_sem = $sem;
			
			
            $param_id = $id;
            
            // Attempt to execute the prepared statement
            if(mysqli_stmt_execute($stmt)){
                // Records updated successfully. Redirect to landing page
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
} else{
    // Check existence of id parameter before processing further
    if(isset($_GET["id"]) && !empty(trim($_GET["id"]))){
        // Get URL parameter
        $id =  trim($_GET["id"]);
        
        // Prepare a select statement
        $sql = "SELECT * FROM sem_master WHERE S_id = ?";
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
                    $sem = $row["Sem"];
                    
                
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
sem=document.getElementById("sem").value;
 var semformat = /^[a-z0-9]/;
alert(sem);

if(sem.match(semformat))
{

return true;
}
else
{
alert("You have entered an invalid sem");

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
                            <label>Semester</label>
                            <input type="text" name="sem" id="sem" class="form-control <?php echo (!empty($sem_err)) ? 'is-invalid' : ''; ?>" value="<?php echo $sem; ?>">
                            <span class="invalid-feedback"><?php echo $sem_err;?></span>
                        </div>
						
        
                        <input type="hidden" name="id" value="<?php echo $id; ?>"/>
                        <input type="submit" class="btn btn-primary" value="Submit">
						
					
                        <a href="semtable.php" class="btn btn-secondary ml-2">Cancel</a>
						
                    </form>
                </div>
            </div>        
        </div>
    </div>
</body>
</html>