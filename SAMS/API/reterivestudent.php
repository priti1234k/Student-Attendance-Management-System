<?Php
$conn=mysqli_connect("localhost","root","","sams");
$result=array();
$result['data']=array();

$sql="select stos_id,studentname,DeptName ,coursename,subjectname from dept_master d, course_master c,student_master f,subject_master s,tblallotstos saf where d.D_id=saf.D_id AND c.Course_id=saf.Course_id AND f.student_id=saf.student_id And s.subject_id=saf.subject_id";;

$res=mysqli_query($conn,$sql);

While($row =mysqli_fetch_array($res))
{
	
	$index['studentame']=$row['studentname'];
$index['coursename']=$row['coursename'];
$index['subjectname']=$row['subjectname'];
	array_push($result['data'],$index);
}

$result['Success']="1";
echo json_encode($result);
mysqli_close($conn);
?>