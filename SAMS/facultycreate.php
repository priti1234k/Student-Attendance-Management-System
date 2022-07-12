<?php
// Include config file
require_once "config.php";
 
// Define variables and initialize with empty values
$facname = $email = $contact  = $gender = $username =$password= "";
$facname_err = $email_err = $contact_err = $gender_err = $username_err = $password_err =  "";
 
// Processing form data when form is submitted
if($_SERVER["REQUEST_METHOD"] == "POST"){
	
    $input_name = trim($_POST["facname"]);
    if(empty($input_name)){
        $facname_err = "Please enter a name.";
    
    } else{
        $facname = $input_name;
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
    if(empty($facname_err) && empty($email_err) && empty($contact_err) && empty($gender_err) && empty($username_err) && empty($password_err)){
        // Prepare an insert statement
        $sql = "INSERT INTO faculty_master (facultyname , Email , Contact , gender , Username , Password , status) VALUES (? , ? , ? , ? , ? ,?, ?)";
         
        if($stmt = mysqli_prepare($conn, $sql)){
            // Bind variables to the prepared statement as parameters
            mysqli_stmt_bind_param($stmt , "sssssss", $param_name, $param_email, $param_contact, $param_gender, $param_username, $param_password, $param_status);
            
            // Set parameters
            $param_name = $facname;
			 $param_email = $email;
			  $param_contact = $contact;
            $param_gender = $gender;
			 $param_username = $username;
			  $param_password = $password;
            $param_status= 'Active';
           
            
            
            // Attempt to execute the prepared statement
            if(mysqli_stmt_execute($stmt)){
                // Records created successfully. Redirect to landing page
                header("location: facultytable.php");
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
	<input type="text" name="facname" placeholder="Enter Faculty Name" class="form-control <?php echo (!empty($facname_err)) ? 'is-invalid' : ''; ?>" value="<?php echo $facname; ?>" >
	 <span class="invalid-feedback"><?php echo $facname_err;?></span>
                        </div>
						<div class="form-group">
	<input type="text" name="email" placeholder="Enter Email" class="form-control <?php echo (!empty($email_err)) ? 'is-invalid' : ''; ?>" value="<?php echo $email; ?>" >
	<span class="invalid-feedback"><?php echo $email_err;?></span></div>
	<div class="form-group">
	<input type="text" name="contact" placeholder="Enter Phone no." class="form-control<?php echo (!empty($contact_err)) ? 'is-invalid' : ''; ?>" value="<?php echo $contact; ?>">
	 <span class="invalid-feedback"><?php echo $contact_err;?></span></div>

	<div class="form-inline form-group" style="text-align: left;">
	<label for="gender" >Gender:</label>    
	
	<select name="gender" id="gender" class="form-control <?php echo (!empty($gender_err)) ? 'is-invalid' : ''; ?>" value="<?php echo $gender; ?>" style="text-align: left;" >
  <option value="Male">Male</option>
  <option value="Female">Female</option>
  <option value="Others">Others</option>
  
  </select>	<span class="invalid-feedback"><?php echo $gender_err;?></span>
	</div>
	<div class="form-group">
	<input type="text" name="username" placeholder="Enter username" class="form-control <?php echo (!empty($username_err)) ? 'is-invalid' : ''; ?>" value="<?php echo $username; ?>" >
	<span class="invalid-feedback"><?php echo $username_err;?></span></div>
	<div class="form-group">
	<input type="text" name="password" placeholder="Enter Password." class="form-control<?php echo (!empty($password_err)) ? 'is-invalid' : ''; ?>" value="<?php echo $password; ?>">
	 <span class="invalid-feedback"><?php echo $password_err;?></span></div>


	
	

	<div class="form-inline form-group">
<input type="submit" name="submit" value="Submit" class="btn btn-primary " >
	<input type="reset" name="clear" value="Clear" class="btn btn-primary"></div>
	</div>
	<div class="panel-footer">
	
	<a href="facultytable.php" class="btn btn-secondary ml-2">Cancel</a>
	</div>
	</div>
	
	</form>
	
	</div>
	</center>
	</div>
	
	</body>
	</html>