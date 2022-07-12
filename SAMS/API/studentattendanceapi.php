<?Php
$conn=mysqli_connect("localhost","root","","sams");


 if($_SERVER['REQUEST_METHOD']=='POST'){

$arr = $_POST['studid'];
$cname=$_POST['coursename'];
$sname=$_POST['subjectname'];
$date=$_POST['date'];
//$attendance=$_POST['togglebutton'];



 //$json = json_decode($arr,true);
   // echo $json;
foreach(/*array_combine(*/$arr /*,$attendance)*/ as $obj /*=> $val*/){
$Sql_Query = "INSERT INTO attendance (studentname,coursename,subjectname,date,attendance) values 
   ('$obj','$cname','$sname','$date','p')";

   if($conn->query($Sql_Query) === TRUE)
   {

//die(json_encode(array("success"=>1,"message"=>"Data Added Successfuly")));

echo "success";

   }
   else{
	   echo "error";
   }


      }


   }
 
  mysqli_close($conn);
 ?>