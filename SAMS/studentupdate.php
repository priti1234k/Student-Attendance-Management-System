<?php
// Include config file
require_once "config.php";
 
// Define variables and initialize with empty values
$studname = $email = $contact  = $gender = $username =$password= "";
$studname_err = $email_err = $contact_err = $gender_err = $username_err = $password_err =  "";
 
 // Processing form data when form is submitted
if($_SERVER["REQUEST_METHOD"] == "POST"){
	// Get hidden input value
    $id = $_POST["id"];
    $input_name = trim($_POST["studname"]);
    if(empty($input_name)){
        $studname_err = "Please enter a name.";
    
    } else{
        $studname = $input_name;
    }
	// Validate email
	$input_email = trim($_POST["email"]);
    if(empty($input_email)){
        $email_err = "Please enter an email id.";     
    } else{
        $email = $input_email;
    }
	// Validate phone no.
	$input_contact = trim($_POST["contact"]);
    if(empty($input_contact)){
        $contact_err = "Please enter phone no.";     
    } elseif(!ctype_digit($input_contact)){
        $contact_err = "Please enter a positive integer value.";
    } else{
        $contact = $input_contact;
    }
   
	// Validate gender
    $input_gender = trim($_POST["gender"]);
    if(empty($input_gender)){
        $gender_err = "Please enter gender.";     
    } else{
        $gender = $input_gender;
    }
	// Validate username
    $input_username = trim($_POST["username"]);
    if(empty($input_username)){
        $username_err = "Please enter username.";     
    } else{
        $username = $input_username;
    } 
	// Validate password
    $input_password = trim($_POST["password"]);
    if(empty($input_password)){
        $password_err = "Please enter password.";     
    } else{
        $password = $input_password;
    }   
	
    // Check input errors before inserting in database
    if(empty($studname_err) && empty($email_err) && empty($contact_err) && empty($gender_err) && empty($username_err) && empty($password_err)){
        // Prepare an insert statement
        $sql = "UPDATE student_master SET studentname=? , Email=? , Contact=?, gender=?, Username=?, Password=? WHERE student_id=?";       
        if($stmt = mysqli_prepare($conn, $sql)){
            // Bind variables to the prepared statement as parameters
           mysqli_stmt_bind_param($stmt , "ssssssi", $param_name, $param_email, $param_contact, $param_gender, $param_username, $param_password,$param_id);
            
            // Set parameters
              $param_name = $studname;
			  $param_email = $email;
			  $param_contact = $contact;
              $param_gender = $gender;
			  $param_username = $username;
			  $param_password = $password;
              $param_id = $id;
            
            // Attempt to execute the prepared statement
            if(mysqli_stmt_execute($stmt)){
                // Records updated successfully. Redirect to landing page
                header("location: studenttable.php");
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
        $sql = "SELECT * FROM student_master WHERE student_id = ?";
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
                $studname = $row["studentname"];
                $email=$row["Email"];
                $contact=$row["Contact"];
                $gender=$row["gender"];
                $username=$row["Username"];
                $password=$row["Password"];
                
				}else{
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
	 <p>Please edit the input values and submit to update the student record.</p>

	
                    <form action="<?php echo htmlspecialchars(basename($_SERVER['REQUEST_URI'])); ?>" method="POST">
                        <div class="form-group">
                            <label>Student Name</label>
                            <input type="text" name="studname" class="form-control <?php echo (!empty($studname_err)) ? 'is-invalid' : ''; ?>" value="<?php echo $studname; ?>">
                            <span class="invalid-feedback"><?php echo $studname_err;?></span>
                        </div>
						<div class="form-group">
						<div class="form-group">
                            <label>Email</label>
                            <input type="text" name="email" class="form-control <?php echo (!empty($email_err)) ? 'is-invalid' : ''; ?>" value="<?php echo $email; ?>">
                            <span class="invalid-feedback"><?php echo $email_err;?></span>
                        </div>
						<div class="form-group">
                            <label>Phone no.</label>
                            <input type="text" name="contact" class="form-control <?php echo (!empty($contact_err)) ? 'is-invalid' : ''; ?>" value="<?php echo $contact; ?>">
                            <span class="invalid-feedback"><?php echo $contact_err;?></span>
                        </div>
						<div class="form-inline form-group" style="text-align: left;">
	<label for="gender" >Gender:</label>    
	
	<select name="gender" id="gender" class="form-control <?php echo (!empty($gender_err)) ? 'is-invalid' : ''; ?>" value="<?php echo $gender; ?>" style="text-align: left;" >
  <option value="Male">Male</option>
  <option value="Female">Female</option>
  <option value="Others">Others</option>
  
  </select>	<span class="invalid-feedback"><?php echo $gender_err;?></span>
	</div>
	
                        <div class="form-group">
                            <label>Username</label>
                            <input type="text" name="username" class="form-control <?php echo (!empty($username_err)) ? 'is-invalid' : ''; ?>" value="<?php echo $username; ?>">
                            <span class="invalid-feedback"><?php echo $username_err;?></span>
                        </div>
						<div class="form-group">
                            <label>Password</label>
                            <input type="text" name="password" class="form-control <?php echo (!empty($password_err)) ? 'is-invalid' : ''; ?>" value="<?php echo $password; ?>">
                            <span class="invalid-feedback"><?php echo $password_err;?></span>
                        </div>
                        <input type="hidden" name="id" value="<?php echo $id; ?>"/>
                        <input type="submit" class="btn btn-primary" value="Submit">
						
					
                        <a href="studenttable.php" class="btn btn-secondary ml-2">Cancel</a>
						
                    </form>
                </div>
            </div>        
        </div>
    </div>
</body>
</html>