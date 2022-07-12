<?php
// Include config file
require_once "config.php";
 $edit_state="";

// Define variables and initialize with empty values
$username = $password = "";
$username_err = $password_err = "";
 
?>

<html>
    <head>
        
        <title>Welcome to Admin</title>
		<link href="css/bootstrap.min.css" rel="stylesheet">
        <script src="js/jquery.js"></script>
        <script src="js/bootstrap.min.js"></script>
		
		<script>
function Validate() {
email=document.getElementById("username").value;
 var mailformat = /^[a-zA-Z0-9.!#$%&'*+/=?^_`{|}~-]+@[a-zA-Z0-9-]+(?:\.[a-zA-Z0-9-]+)*$/;
alert(email);
var passwd=document.getElementById("password").value;
var pat = /^(?=.*\d)(?=.*[a-z])(?=.*[A-Z])(?=.*[^a-zA-Z0-9])(?!.*\s).{8,15}$/;
alert(passwd);
if(email.match(mailformat) && passwd.match(pat))
{

return true;
}
else
{
alert("You have entered an invalid email address and password");

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
	<form style="padding:5%" action="insertuser.php" method="post" name="userform" onsubmit="return Validate();">
	<div class="panel panel-default">
	<div class="panel-heading">
	<h2 class="mt-5">Create New Admin </h2>
                    
	</div>
	<div class="panel-body">
	           <input type="hidden" name="id" value="<?php echo $id; ?>"/>
	<div class="form-group">
	<input type="text" id="username" name="username"  placeholder="Enter Email " class="form-control <?php echo (!empty($username_err)) ? 'is-invalid' : ''; ?>" value="<?php echo $username; ?>">
                            <span class="invalid-feedback"><?php echo $username_err;?></span>
                        
                        </div>
						<div class="form-group">
	<input type="password" id="password" name="password" placeholder="Enter Password" class="form-control <?php echo (!empty($password_err)) ? 'is-invalid' : ''; ?>" value="<?php echo $password; ?>">
                            <span class="invalid-feedback"><?php echo $password_err;?></span>
                      </div>
</div>
	<div class="form-inline form-group">
	<?php if($edit_state==false):?>
<input type="submit" name="save" value="Save" class="btn btn-primary " >
<?php else:?>
<input type="submit" name="update" value="update" class="btn btn-primary " >
<?php endif?>
	<input type="reset" name="clear" value="Clear" class="btn btn-primary"></div>
	</div>
	<div class="panel-footer">
	
	<a href="Admintable.php" class="btn btn-secondary ml-2">Cancel</a>
	</div>
	</div>
		
	</form>
	
	</div>
	</center>
	</div>

	</body>
	</html>