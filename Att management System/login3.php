<?php
session_start();
$con=mysqli_connect('localhost','username','password');

mysqli_select_db($con,'student');

$sql="SELECT * FROM student_data_cs3";
$records=mysqli_query($con,$sql);
?>
<html>
<title>student data cs3</title>
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
input[type=submit] {
    background-color: #4CAF50;
    color: white;
    padding: 12px 20px;
    border: none;
    border-radius: 4px;
    cursor: pointer;
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
<br>
<center>
<table border="1">
	<form action="update3.php" method="post">
<tr>
	<th>S.No</th>
	<th>HT.No</th>
	<th>Attendance</th>
	<th>Name</th>
	<th>Section</th>
	</tr>

<?php
$date=$_SESSION['date'];
echo "DATE: ". $date;
echo "<br><br>";
$periods=array();

$periods=$_SESSION['periods'];
$_SESSION['selected_date']=$date;


$sql2="SELECT * FROM student_data_cs3";
$record=mysqli_query($con,$sql2);

	$i=1;

	while($stu=mysqli_fetch_assoc($record))
	{
	
	echo "<tr>";
	echo "<td>".$stu['s_no']."</td>";
	echo "<td>".$stu['ht_no']."</td>";
	echo '<td> <input type="checkbox" name="id'.$i.'" value="0" checked/></td>';
	echo "<td>".$stu['student_name']."</td>";
	echo "<td>".$stu['section_batch']."</td>";
	echo "</tr>";
	 
	$i++;
	}

	echo ('<tr colspan="5"><input type="submit" value="Submit" name="submit"/></tr></form>');
?>


</table>
</center>
</body>
</html>
