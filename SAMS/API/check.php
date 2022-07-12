 <?php
 $con=mysqli_connect("localhost","root"," ","multipleinsert");

 if($_SERVER['REQUEST_METHOD']=='POST'){

$arr = $_POST['params'];





 $json = json_decode($arr,true);
    echo $json;
foreach($json as $obj){

$Sql_Query = "INSERT INTO Match_list (name) values 
   ('$obj->name')";

   if($con->query($Sql_Query) === TRUE)
   {

    die(json_encode(array("success"=>1,"message"=>"Data Added 
 Successfuly")));



   }


      }


   }

  mysqli_close($con);
 ?>
j