<?php 
		
   $conn=mysqli_connect("localhost","root","","sams");
	
      $email = $_POST["username"];
   $password = $_POST["password"];

    $sql = "SELECT * FROM faculty_master WHERE  Username = '$email' AND Password = '$password' AND status='Active'";
		 $response = mysqli_query($conn, $sql);

    $result = array();
    $result['login'] = array();
    
    if ( mysqli_num_rows($response) === 1 ) {
        
        

        
While($row =mysqli_fetch_array($response))
{
	 
            
            $index['facultyname'] = $row['facultyname'];
            $index['Email'] = $row['Email'];
            $index['Fac_id'] = $row['Fac_id'];
			$index['Contact'] = $row['Contact'];
			$index['Username'] = $row['Username'];

            array_push($result['login'], $index);

            $result['success'] = "1";
            $result['message'] = "success";
            echo json_encode($result);

            mysqli_close($conn);

        }

    }




?>