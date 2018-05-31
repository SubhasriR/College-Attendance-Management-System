<?php
session_start();
?>

<!DOCTYPE html>
<head>
	<title>Absentees cs3</title>
	<style>
ul {
    list-style-type: none;
    margin: 0;
    padding: 0;
    overflow: hidden;
    background-color: #dddddd;
}

li {
    float: left;
}

li a {
    display: block;
    color: black;
    text-align: center;
    padding: 14px 16px;
    text-decoration: none;
    font-weight: 50px;
}

li a:hover:not(.active) {
    background-color: white;
}

.active {
    background-color: #4CAF50;
}

table {
    font-family: arial, sans-serif;
    border-collapse: collapse;
    width: 60%;
}

td, th {
    border: 2px solid black;
    text-align: left;
    padding: 8px;
}

th {
    background-color: #dddddd;
}

</style>
</head>
<body>

		<header style="padding-left: 400px"><img src="header_inside.jpg"></header>

<ul>
  <li><a class="active" href="gui.php">Daily Attendance</a></li>
    <li><a href="cumpg2.php">Cumulative Attendance</a></li>

  <li style="float:right"><a href="index1.html">Logout</a></li>
</ul>
<center>

<?php
$con=mysqli_connect('localhost','username','password');
mysqli_select_db($con,'student');
$absentees=array();
$absentees=$_SESSION['new'];
$abs=$absentees;
$periods=array();
$periods=$_SESSION['periods'];
$date=$_SESSION['selected_date'];
echo "<br>";
echo "DATE: ".$date."<br>";
echo "<br>";

$hdate=$_SESSION['selected_date'];

$noofperiods=0;
for($i=1;$i<7;$i++)
{ 
	if($periods[$i]==1)
		$noofperiods++;
}
$date=$_SESSION['selected_date'];

$k=1;
$count=0;
$nstud=74;
for($k=1;$k<=6;$k++)
{
if($periods[$k]==1)
{
for($i=1;$i<$nstud;$i++)
{	//echo "$i      ";

//	$a=$abs[$i];
	if($a=$abs[$i]){echo "";} 
	if($a==1)
	{	//echo "abs : $absentees[$i]    ";	
		$d=$date."-".$k;	
		//echo " updating $i  ";				// 0 or 1
		$sql1="UPDATE `daily_attendance_cs3` SET `".$d."`=0 WHERE `s_no`=".$i;
		$res=mysqli_query($con,$sql1) or die("Not possible to update");
		$count++;
	}
}
}
}
echo "No.of absentees:".$count/$noofperiods;


?>
<table>
	<tr>
	<th>S.No</th>
	<th>HT.No</th>
	<th>Name</th>
	<th>Section</th>
	</tr>
<?php
for($i=1;$i<=sizeof($absentees);$i++)
{
	if($absentees[$i]==1)
	{
$sql2="SELECT `s_no`,`ht_no`,`student_name`,`section_batch` FROM student_data_cs3 WHERE `s_no`='$i'";
$record=mysqli_query($con,$sql2);
	while($stu=mysqli_fetch_assoc($record))
	{
	
	echo "<tr>";
	echo "<td>".$stu['s_no']."</td>";
	echo "<td>".$stu['ht_no']."</td>";
	//echo '<td> <input type="checkbox" name="id'.$i.'" value="0" checked/></td>';
	echo "<td>".$stu['student_name']."</td>";
	echo "<td>".$stu['section_batch']."</td>";
	echo "</tr>";
	}
	}
}
echo "</table>";
?>
</center>
</body>
</html>
