<?php 

session_start();

$con=mysqli_connect('localhost','username','password');
mysqli_select_db($con,'student');
$sql1="SELECT tusername,tpassword FROM teacher_login";
$exe1=mysqli_query($con,$sql1);
if(isset($_POST['login']))
{

$test_uname=$_POST['uname'];
$test_pword=$_POST['pword'];
$_SESSION['uname']=$_POST['uname'];
}
$flag=0;



while($tea=mysqli_fetch_assoc($exe1))
{
	if($test_uname==$tea['tusername'])
	{
	$flag=1;
		if($test_pword==$tea['tpassword'])
		{
			echo "Hello!".$test_uname;
			header('Location:gui.php');
			break;
		}
		if($flag==1)
		{
		echo "Invalid password";
		}
	}
}
if($flag==0)
{
echo "Invalid username";
}
	?>
