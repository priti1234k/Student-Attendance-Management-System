<?php
// Include config file
require_once "config.php";
 

// Define variables and initialize with empty values
$username = $password = "";
$username_err = $password_err = "";
 
 
if(isset($_POST["save"])){
	$edit_state=false;
// Processing form data when form is submitted
if($_SERVER["REQUEST_METHOD"] == "POST"){
	
    $input_name = trim($_POST["username"]);
    if(empty($input_name)){
        $username_err = "Please enter vaild email name.";
    } else{
        $username = $input_name;
    }
	// Validate email
	$input_password = trim($_POST["password"]);
    if(empty($input_password)){
        $password_err = "Please enter correct password.";     
    } else{
        $password = $input_password;
    }

    
	
    // Check input errors before inserting in database
    if(empty($username_err) && empty($password_err)){
        // Prepare an insert statement
        $sql = "INSERT INTO user_master (UserName, Password , status) VALUES (? , ? ,?)";
         
        if($stmt = mysqli_prepare($conn, $sql)){
            // Bind variables to the prepared statement as parameters
            mysqli_stmt_bind_param($stmt , "sss", $param_username, $param_password, $param_status);
            
            // Set parameters
            $param_username = $username;
			 $param_password = $password;
			  $param_status = 'active';
          
            
            
            // Attempt to execute the prepared statement
            if(mysqli_stmt_execute($stmt)){
                // Records created successfully. Redirect to landing page
                header("location: Admintable.php");
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
}
else if(isset($_POST["update"]))
{
	if(isset($_POST["id"]) && !empty($_POST["id"])){
    // Get hidden input value
    $id = $_POST["id"];
    
    // Validate name
    $input_name = trim($_POST["username"]);
    if(empty($input_name)){
        $username_err = "Please enter valid name.";
    }  else{
        $username = $input_name;
    }
	// Validate email
	$input_password = trim($_POST["password"]);
    if(empty($input_password)){
        $password_err = "Please enter an password.";     
    } else{
        $password = $input_password;
    }

    // Check input errors before inserting in database
    if(empty($username_err) && empty($password_err)){
        // Prepare an update statement
        $sql = "UPDATE user_master SET UserName=?,Password=?  WHERE U_id=?";
         
        if($stmt = mysqli_prepare($conn, $sql)){
            // Bind variables to the prepared statement as parameters
            mysqli_stmt_bind_param($stmt, "ssi", $param_name, $param_password,  $param_id);
            
            // Set parameters
            $param_name = $username;
			 $param_password = $password;
			
            $param_id = $id;
            
            // Attempt to execute the prepared statement
            if(mysqli_stmt_execute($stmt)){
                // Records updated successfully. Redirect to landing page
                header("location: index.php");
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
}
 }   // Check existence of id parameter before processing further
    if(isset($_GET["id"]) && !empty(trim($_GET["id"]))){
        // Get URL parameter
        $id =  trim($_GET["id"]);
        
        // Prepare a select statement
        $sql = "SELECT * FROM user_master WHERE U_id = ?";
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
                    $username = $row["UserName"];
                    $password=$row["Password"];
                
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

 
 ?>