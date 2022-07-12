<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
	
      <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/css/bootstrap.min.css" rel="stylesheet" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" />
    <link rel="stylesheet" href="styles.css" />
	
        
 
    <title>Student Attendance management system| Admin Dashboard</title>
</head>

<body>
    <div class="d-flex" id="wrapper">
        <!-- Sidebar -->
        <div class="bg-white" id="sidebar-wrapper">
            <div class="sidebar-heading text-center py-4 primary-text fs-4 fw-bold text-uppercase border-bottom"><i
                    class="fas fa-user-secret me-2"></i>Admin</div>
            <div class="list-group list-group-flush my-3">
                <a href="index.php"  class="list-group-item list-group-item-action bg-transparent second-text active"><i
                        class="fas fa-tachometer-alt me-2"></i>Dashboard</a>
					   <a href="#sub" class="list-group-item list-group-item-action bg-transparent second-text fw-bold " data-bs-toggle="collapse"aria-expanded="false" aria-controls="sub"><i
                        class="fas fa-angle-down me-2"></i> Master</a>
			<div id="sub" class="collapse">
						
                <a href="Admintable.php#um"  class="list-group-item list-group-item-action bg-transparent second-text fw-bold"><i
                        class="fas fa-user-alt me-2"></i>User Master</a>
                <a href="depttable.php#dm"  class="list-group-item list-group-item-action bg-transparent second-text fw-bold"><i
                        class="fas fa-book-open me-2"></i>Dept Master</a>
                <a href="yeartable.php#ym"  class="list-group-item list-group-item-action bg-transparent second-text fw-bold"><i
                        class="far fa-calendar me-2"></i>Year Master</a>
                <a href="semtable.php#sm"  class="list-group-item list-group-item-action bg-transparent second-text fw-bold"><i
                        class="far fa-calendar me-2"></i>Semester Master</a>
                <a href="coursetable.php#cm"  class="list-group-item list-group-item-action bg-transparent second-text fw-bold"><i
                        class="fas fa-book-open me-2"></i>Course</a>
                <a href="subjecttable.php#subm"  class="list-group-item list-group-item-action bg-transparent second-text fw-bold"><i
                        class="fas fa-book-open me-2"></i>Subject</a>
			    <a href="facultytable.php#fm" class="list-group-item list-group-item-action bg-transparent second-text fw-bold"><i
                        class="fas fa-user-friends me-2"></i>Faculty</a>
				<a href="studenttable.php#studm" class="list-group-item list-group-item-action bg-transparent second-text fw-bold"><i
                        class="fas fa-user-graduate me-2"></i>Student</a>
			</div>
			<a href="#sub1" class="list-group-item list-group-item-action bg-transparent second-text fw-bold " data-bs-toggle="collapse" aria-expanded="false" aria-controls="sub"><i
                        class="fas fa-angle-down me-2"></i> Transaction</a>
			<div id="sub1" class="collapse">

			    <a href="satofactable.php#" class="list-group-item list-group-item-action bg-transparent second-text fw-bold"><i
                        class="fas fa-clipboard-check me-2"></i>Assign Subject to Faculty</a>
				<a href="satostudtable.php#" class="list-group-item list-group-item-action bg-transparent second-text fw-bold"><i
                        class="fas fa-book-reader me-2"></i>Assign Subject to Student</a>
			
			</div>
                <a href="#" class="list-group-item list-group-item-action bg-transparent text-danger fw-bold"><i
                        class="fas fa-power-off me-2"></i>Logout</a>
            </div>
        </div>
        <!-- /#sidebar-wrapper -->

        <!-- Page Content -->
        <div id="page-content-wrapper">
            <nav class="navbar navbar-expand-lg navbar-light bg-transparent py-4 px-4">
                <div class="d-flex align-items-center">
                    <i class="fas fa-align-left primary-text fs-4 me-3" id="menu-toggle"></i>
                    <h2 class="fs-2 m-0">Dashboard</h2>
                </div>

                <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                    data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent"
                    aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <ul class="navbar-nav ms-auto mb-2 mb-lg-0">
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle second-text fw-bold" href="#" id="navbarDropdown"
                                role="button" data-bs-toggle="dropdown" aria-expanded="false">
                                <i class="fas fa-user me-2"></i>Admin
                            </a>
                            <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                                <li><a class="dropdown-item" href="#">Profile</a></li>
                                <li><a class="dropdown-item" href="#">Settings</a></li>
                                <li><a class="dropdown-item" href="#">Logout</a></li>
                            </ul>
                        </li>
                    </ul>
                </div>
            </nav>
<!-- Admin or user master -->
<div class="" id="um">
            <div class="container-fluid px-4">
			

                <div class="row my-5">
                    <h3 class="fs-4 mb-3">User Master</h3>
                    <div class=" table bg-white rounded shadow-sm  table-hover">
					<div class="col">
                     
                        <a href="create.php" class="btn btn-success pull-right"><i class="fa fa-plus"></i> Add New User</a>
                    </div>
				   <?php

 require_once "config.php";
$sql="select * from user_master where status='active'";
$edit_state=true;
if($query=mysqli_query($conn,$sql))
{
if(mysqli_num_rows($query)>0)
{
	echo '<table class="table table-bordered table-striped">';
                                echo "<thead>";
                                    echo "<tr>";
                                        echo "<th>#</th>";
                                        echo "<th>User Name</th>";
                                        echo "<th>Password</th>";
										
                                        echo "<th>Action</th>";
                                    echo "</tr>";
                                echo "</thead>";
                                echo "<tbody>";
	 
while($row=mysqli_fetch_assoc($query))
{
	
	echo "<tr>";
                                        echo "<td>" . $row['U_id'] . "</td>";
                                        echo "<td>" . $row['UserName'] . "</td>";
										echo "<td>" . $row['Password'] . "</td>";
										
                                        echo "<td>";
                                           
											echo '<a href="create.php?id='. $row['U_id'] .'" class="mr-3" title="Update Record" data-toggle="tooltip"><span class="fas fa-pen"></span></a>';
                                           echo " ";
											echo '<a href="delete.php?id='. $row['U_id'] .'" title="Delete Record" data-toggle="tooltip"><span class="fa fa-trash"></span></a>';
                                        echo "</td>";
                                    echo "</tr>";
}
 echo "</tbody>";                            
echo "</table>";
mysqli_free_result($query);
}
else{
         echo '<div class="alert alert-danger"><em>No records were found.</em></div>';
      }
}
else
{
	echo "Oops! Something went wrong. Please try again later.".mysqli_error($conn);
}
mysqli_close($conn);
?></div>
</div>

                    </div>
            </div>
			
</div>   
   <!-- /#page-content-wrapper -->
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/js/bootstrap.bundle.min.js"></script>
    <script>
        var el = document.getElementById("wrapper");
        var toggleButton = document.getElementById("menu-toggle");

        toggleButton.onclick = function () {
            el.classList.toggle("toggled");
        };

</script>
    </script>
	
</body>

</html>