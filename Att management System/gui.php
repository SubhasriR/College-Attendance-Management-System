<?php
session_start();
?>

<!DOCTYPE html>
<html>
<head>
<style>
.box{
	width:20px;
	height:20px;
}
 
.red{
	background:red;
}
.green{
	background:green;
}
.blue{
	background:blue;
}
.yellow{
	background:yellow;
}

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
<?php
echo "WELCOME!" .$_SESSION['uname'];
?>
<center >
<form action="mmm.php" method="post" style="">

	<table cellpadding="10" style="width:70%; border-collapse: collapse;border: 2px solid black;" >
		<tr>
			<td>
				Program:<select name="program">
				    <option value="be">BE</option>
				    <option value="mba">MBA</option>
				    <option value="mca">MCA</option>
			    </select>
			</td>

			<TD>
				Branch: <select name="branch">
				    <option value="cse">CSE</option>
				    <option value="ece">ECE</option>
				    <option value="it">IT</option>
				    <option value="mech">MECH</option>
				    <option value="eee">EEE</option>
				    <option value="biotech">BIO TECH</option>
				    <option value="civil">CIVIL</option>
				    <option value="mba">MBA</option>
				    <option value="mba">MBA</option>
				    <option value="mca">MCA</option>
			    </select>
			</TD>

			<td>
				Semester: <select name="sem">
				    <option value="Isem">I SEM</option>
				    <option value="IIsem">II SEM</option>
				    <option value="IIIsem">III SEM</option>
				    <option value="IVsem">IV SEM</option>
				    <option value="Vsem">V SEM</option>
				    <option value="VIsem">VI SEM</option>
				    <option value="VIIsem">VII SEM</option>
				    <option value="VIIIsem">VIII SEM</option>
			    </select>
			</td>

			<td>
				Section: <select name="section">
				    <option value="CSE 1">CSE 1</option>
				    <option value="CSE 2">CSE 2</option>
				    <option value="CSE 3">CSE 3</option>
			    </select>
			</td>
			<TD>
				DATE:<input type="date" name="date">
			</TD>
		</tr>
	</table>
<br>
	<table style="width: 70%;">
		<tr>
		<td>
				Subject: <select name="subject">
				    <option value="wt">Web Technologies</option>
				    <option value="dbms">Database Management Systems</option>
				    //add subjects required		    
			    </select>
			</td>
			<td>
				Division:&nbsp&nbsp<select value="division" style="width: 100px">
					<option></option>
				</select>
			</td>

			<td>
				Classes Conducted:
			</td>

			<td rowspan="2">
				Topic: <textarea name="message" rows="5" cols="30"></textarea>
			</td>
		</tr>
		<tr>
			<td>
				<input type="checkbox" name="lbe">
				Lab Batch Entry: <select name="drop1" style="width: 230px;"><option></option></select>
			</td>
			<td>
				Employee:<select name="drop2" style="width: 100px"><option></option></select>
			</td>
			<td>
				<input type="checkbox" name="ck2w">Exam
				<input type="checkbox" name="ck3eh">Excluded Hours
			</td>
		</tr>
	</table>
	<br>
	<table style="width: 70%;border: 2px solid black;border-collapse: collapse;">
		<tr style="background-color: #dddddd;">
			<th>Day</th>
			<th style="border: 1px solid black;"><input type="checkbox" name="ck1" >1</th>
			<th style="border: 1px solid black;"><input type="checkbox" name="ck2" >2</th>
			<th style="border: 1px solid black;"><input type="checkbox" name="ck3" >3</th>
			<th style="border: 1px solid black;"><input type="checkbox" name="ck4" >4</th>
			<th style="border: 1px solid black;"><input type="checkbox" name="ck5" >5</th>
			<th style="border: 1px solid black;"><input type="checkbox" name="ck6" >6</th>
		</tr>
		<tr>
			<th style="border: 1px solid black;">Sat</th>
			<th style="border: 1px solid black;"></th>
			<th style="border: 1px solid black;"></th>
			<th style="border: 1px solid black;"></th>
			<th style="border: 1px solid black;"></th>
			<th style="border: 1px solid black;"></th>
			<th style="border: 1px solid black;"></th>
		</tr>
	</table>
	<br>
	<table style="width: 70%;border-collapse: collapse;">
		<tr>
			<td><div style="align-content: left" class="box blue"></div></td>
			<td>Attendance not Entered</td>
			<td><div class="box green"></div></td>
			<td>Attendance Entered</td>
			<td><div class="box red"></div></td>
			<td>Attendance entered not matching with the timetable</td>
			<td><div class="box yellow"></div></td>
			<td>Class cancelled</td>
			<td><input type="submit" name="showstudents" value="Show Students"></td>
		</tr>

	</table>
	</form>
</center>

</body>
</html>
	
	
