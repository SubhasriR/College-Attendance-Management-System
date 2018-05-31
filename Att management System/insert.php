<?php
$con = mysqli_connect('localhost','username','password');
if(!$con)
{
echo 'not connected to server';
}
if(!mysqli_select_db($con,'student'))
{
echo 'database not selected';
}
$id=$_POST['tid'];
$name=$_POST['tname'];
$username=$_POST['tusername'];

$password=$_POST['tpassword'];
$dob=$_POST['tdob'];
$phnno=$_POST['tphnno'];
$email=$_POST['temail'];
if($id=='ID18')
{
$sql1="INSERT INTO teacher_login(tid,tname,tusername,tpassword) VALUES ('$id','$name','$username','$password')";
$sql2="INSERT INTO teacher_logininfo(tid,tname,tusername,tpassword,tdob,tphnno,temail) VALUES ('$id','$name','$username','$password','$dob','$phnno','$email')";
if(!mysqli_query($con,$sql1)&&!mysqli_query($con,$sql2))
{
echo 'not registered';
}
else
{
echo 'registered succesfully';
}
}
else
{
	echo 'INVALID ID';
}






?>
