<?Php
$conn=mysqli_connect("localhost","root","","sams");
if(isset($_GET['coursename'])){
$sql="select subject_id ,subjectname from subject_master where Course_id=(select Course_id from course_master where coursename='".$_GET['coursename']."')";
if(!$conn->query($sql)){
echo "error";
}
else
{
$result=$conn->query($sql);
if($result->num_rows>0){
$return_arr['subjectname']=array();
while($row = $result->fetch_array()){
array_push($return_arr['subjectname'],array(
'subject_id'=>$row['subject_id'],
'subjectname'=>$row['subjectname']
));
}
echo json_encode($return_arr);
}
}
}
?>