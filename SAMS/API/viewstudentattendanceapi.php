<?Php
$conn=mysqli_connect("localhost","root","","sams");
$result=array();
$result['data']=array();

$dateto=$_GET['date'];
$coursename=$_GET['coursename'];
$subjectname=$_GET['subjectname'];
$sql="SELECT * FROM `attendance` WHERE date like'%$dateto%'and coursename='$coursename'and subjectname='$subjectname'";

$res=mysqli_query($conn,$sql);

While($row =mysqli_fetch_array($res))
{
	
	$index['studentname']=$row['studentname'];
	$index['coursename']=$row['coursename'];
	$index['subjectname']=$row['subjectname'];
	$index['date']=$row['date'];
	$index['attendance']=$row['attendance'];
	array_push($result['data'],$index);
}
$result['Success']="1";
echo json_encode($result);
mysqli_close($conn);
?>