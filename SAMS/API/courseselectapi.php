<?Php
$conn=mysqli_connect("localhost","root","","sams");
$sql="select * from course_master";
if(!$conn->query($sql)){
echo "error";
}
else
{
$result=$conn->query($sql);
if($result->num_rows>0){
$return_arr['coursename']=array();
while($row = $result->fetch_array()){
array_push($return_arr['coursename'],array(
'Course_id'=>$row['Course_id'],
'coursename'=>$row['coursename']
));
}
echo json_encode($return_arr);
}
}
?>