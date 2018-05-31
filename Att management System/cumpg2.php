<?php
session_start();
?>
<!DOCTYPE html>
<html>
<head>
	<title>Attendance Register</title>
	<style type="text/css">
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

li a.active {
    color: white;
    background-color: #4CAF50;
}

#nnn
{
text-align: center;
    float:center;
    margin-top: 100px;
    margin-left: 580px;
    position:absolute;
    overflow:hidden;
  padding:50px,30px,50px,80px;

  }
    input[type=submit] {
    background-color: #4CAF50;
    color: white;
    padding: 12px 20px;
    border: none;
    border-radius: 4px;
    cursor: pointer;
    margin-left: 100px;
}

input[type=text]{
    width: 100%; 
    padding: 10px; 
    border: 1px solid #ccc; 
    border-radius: 4px; 
    box-sizing: border-box; 
    margin-bottom: 16px; 
}
input[type=date]{
    width: 100%; 
    padding: 10px; 
    border: 1px solid #ccc; 
    border-radius: 4px; 
    box-sizing: border-box; 
    margin-bottom: 16px; 
}
}
</style>
</head>
<body>

<header style="padding-left: 400px"><img src="header_inside.jpg"></header>

<ul>
  <li><a href="gui.php">Daily Attendance</a></li>
    <li><a href="cumpg2.php">Cumulative Attendance</a></li>

  <li style="float:right"><a href="index1.html">Logout</a></li>
</ul>
<br>
	
  <div id="nnn">
    <center>
  <table >
<form method="post" action="cmdisp2.php">
	<tr><td><b>T ID:</b></td><td><input type="text" name="tid" /></td></tr>
  <tr><td><b>Class:</b></td><td><input type="text" name="class" /></td></tr>
  <tr><td><b>Start Date:</b></td><td><input type="date" name="date1" /></td></tr>
  <tr><td><b>End Date:</b></td><td><input type="date" name="date2" /></td></tr>
  <tr><td colspan="2"><input type="submit" name="show" value="SHOW" /></td></tr>
	</form>
</table>
</center>
</div>
</body>
</html>