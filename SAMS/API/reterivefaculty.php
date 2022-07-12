<?Php
$conn=mysqli_connect("localhost","root","","sams");
$result=array();
$result['data']=array();

$sql="select * from faculty_master where status='active'";

$res=mysqli_query($conn,$sql);

While($row =mysqli_fetch_array($res))
{
	$index['Fac_id']=$row['0'];
	$index['facultyname']=$row['1'];
	$index['Email']=$row['2'];
	$index['Contact']=$row['3'];
	$index['gender']=$row['4'];
	array_push($result['data'],$index);
}
$result['Success']="1";
echo json_encode($result);
mysqli_close($conn);
?>