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
                <a href="index.php#"  class="list-group-item list-group-item-action bg-transparent second-text active"><i
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
                <a href="semtable.php#sm" class="list-group-item list-group-item-action bg-transparent second-text fw-bold"><i
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
			

                </div>
				</div>
			<!-- Department master -->  
<div class="" id="dm">			
				<div class="container-fluid px-4">
               

                
                    </div>
            </div>
			<!-- year master -->
			<div class="" id="ym">
			<div class="container-fluid px-4">
               
               
            </div>
</div>            
			<!-- semester master -->
			<div class="" id="sm">
			 <div class="container-fluid px-4">
                
    </div>
	</div>
	<!-- Course master -->
	<div class="" id="cm">
	<div class="container-fluid px-4">
                
              
            </div>
		</div>
		<!-- subject master -->	
		<div class="" id="subm">
			<div class="container-fluid px-4">
                
               </div>
</div>   
   <!-- Faculty Master -->
   <div class="" id="fm">
             <div class="container-fluid px-4">
                
                
            </div>
        </div>
		<!-- Student master -->
		<div class="" id="studm">
		<div class="container-fluid px-4">
                
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