<?php 
session_start();	
$con=mysqli_connect('localhost','username','password');
mysqli_select_db($con,'student');
$sql1="SELECT ht_no,spassword FROM student_login";
$exe1=mysqli_query($con,$sql1);
if(isset($_POST['login']))
{
$test_uname=$_POST['uname'];
$_SESSION['name']=$_POST['uname'];
$test_pword=$_POST['tpassword'];
$_SESSION['pword']=$_POST['tpassword'];

}
$flag=0;

while($tea=mysqli_fetch_assoc($exe1))
{
	if($test_uname==$tea['ht_no'])
	{
	$flag=1;
		if($test_pword==$tea['spassword'])
		{
			echo "Hello!".$test_uname;
			header('Location:sattendance1.php');
			break;
		}
		if($flag=1)
		{
		echo "Invalid password";
		}
	}
}
if($flag=0)
{
echo "Invalid username";
}
	?>
