<?php 
session_start();
$con=mysqli_connect('localhost','username','password');
mysqli_select_db($con,'student');
$test_uname=$_SESSION['name'];
$test_pword=$_SESSION['pword'];
?>
<!DOCTYPE html>
<html>
<head>
	<title>Attendance</title>
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

li a.active {
    color: white;
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
  <li><a class="active" href="sattendance.php">Home</a></li>
  <li style="float:right"><a href="index1.html">Logout</a></li>
</ul>
<center>
<?php
echo "<br>";
echo "Welcome! ". $_SESSION['name'];
echo "<br><br>";
$pcount=0;
$tcount=0;
$sql2="SELECT * FROM `daily_attendance_cs3` WHERE `ht_no`='$test_uname'";
$record=mysqli_query($con,$sql2);

	echo "<table border='1px' >";
	echo "<tr>
	<th>DATE</th>
	<th>1</th>
	<th>2</th>
	<th>3</th>
	<th>4</th>
	<th>5</th>
	<th>6</th></tr>";

$date='2018-04-01';
$date2='2018-04-08';
$period = new DatePeriod(
     new DateTime($date),
     new DateInterval('P1D'),
     new DateTime($date2)
);
$class="CSE3-2/4";
$dates = array();
$i=1;
foreach ($period as $key => $value) {
    $dates[$i]=$value->format('Y-m-d'); 
    //echo "<br>".$dates[$i];			//-------------------------- dates obtained
    $i++;
}
$n=$i-1;


$i=1;
$day = array();
foreach ($period as $key => $value) {
    $day[$i]=date('D', strtotime($value->format('Y-m-d')));
    //echo "<br>".$day[$i];			//----------------------------- days obtained
    $i++;
}
$stuatt=array();
for($i=1;$i<=$n;$i++)
		{	//$stuatt[$i]=array();
		}

$p=1;
$q=1;
$prds=array();
	while($stu=mysqli_fetch_assoc($record))
	{
		for($i=1;$i<=$n;$i++)
		{	//$stuatt[$i]=array();
			//echo " in the loop <br>";
			echo "<tr>";
			echo "<td>".$dates[$i]."</td>";
			
			for($j=1;$j<7;$j++)
			{
				$r=$dates[$i]."-".$j;
			//echo  $stu[$r] ;						//-----------
				$stuatt[$i][$j]=$stu[$dates[$i]."-".$j];
				$t=$stuatt[$i][$j];
		//echo " echoing $t<br>";						//-----------
				if($stu[$dates[$i]."-".$j]==1)
				{
					echo "<td><p>P</p></td>";
					$pcount++;
					$tcount++;
				}
				else 
				{
					echo "<td><p style='color:red;'>A</p></td>";
					$tcount++;
				}
				$q++;
			} 
			echo "</tr>";
			$p++;
		}
		
	}
	echo "</table>";
	

/*	$sub1=0;
	$sub1t=0;
	$sub2=0;
	$sub2t=0;
	$sub3=0;
	$sub3t=0;
	$sub4=0;
	$sub4t=0;
	$sub5=0;
	$sub5t=0;
	$sub6=0;
	$sub6t=0;
*/

//echo "p: $p<br>";
for($i=1;$i<$p;$i++)	//disp stuatt whole
	{
		for($j=1;$j<7;$j++)
		{	//echo " hi ";
			$t=$stuatt[$i][$j];
			//echo "$t ";
		}
	
	}


	for($i=1;$i<=$n;$i++)				// disp stuatt array
		{	
			//echo "<br>===========$i==========<br>";
			//echo " ".$dates[$i]."    ";
			
			for($j=1;$j<7;$j++)
			{
				//echo "[$i][$j] <br>";
				$t=$stuatt[$i][$j];

				//echo "  $t"."  ";	
			}
			//echo "<br>";
		}


	$subtc=array();
	$subc=array();
	$nsub=1;
	//$j=1;
	$s=array();

	//echo " subjects: <br><br>";
		$sq="SELECT `sub_code` FROM `t_subjects` WHERE `class`='$class'";
		$rec=mysqli_query($con,$sq);
		while($st=mysqli_fetch_assoc($rec))
		{
			$s[$nsub]=$st['sub_code'];
			//echo $s[$nsub]."  ";
			$nsub++;
		}
	
	$v=$nsub;
	for($i=1;$i<$v;$i++)
	{
		$subc[$i]=0;
		$subtc[$i]=0;
	}



	//echo "<br> p : $p <br> ";
	for($i=1;$i<$p;$i++)	//for each date
	{
		//fetch the time table for day[i]
		$sq="SELECT * FROM `s_timetable` WHERE `day`='$day[$i]' AND `class`='$class'";
		$rec=mysqli_query($con,$sq);
		while($st=mysqli_fetch_assoc($rec))
		{
			$myarr=$stuatt[$i];
		/*	for($j=1;$j<7;$j++)
			{
				echo " $myarr[$j] ";
			}
		*/
			
			for($j=1;$j<7;$j++)
			{
				//$vs="p".$j;
				$vs=$j;
				$prds[$j]=$s[$vs];

				for($k=1;$k<$nsub;$k++)
				{
					if($prds[$j]==$s[$k])
					{	
						$subtc[$k]++;
						$t=$stuatt[$i][$j];
						//echo "$k: $t added <br>";
						if($stuatt[$i][$j]==1)
						{
							//echo "$k: $t added<br>";
							$subc[$k]++;
						}
					/*					
						$x=$k*2;
						echo " ".$x."<br>";
						$subc[$x-1]++;
						$t=$stuatt[$i][$j];
						echo "$t added<br>";
						$subc[$x]=$subc[$x]+$t;		//attendance
						echo "after adding : $subc[$x]<br>";	
					*/		
					}
				}
			}
		}
	}

//$v=($nsub-1)*2;
	echo "<table>";
	echo "<th>S.no</th>"."<th>Subject Code</th>"."<th>Total Classes Held</th>"."<th>Total Classes Attended</th>";
for($k=1;$k<$v;$k++)
{	echo "<tr>";
	echo "<br><td>$k </td>"."<td>".$s[$k]."</td>"."<td>".$subtc[$k]."</td>"."<td>".$subc[$k]."</td>"."   ";
	echo "</tr>";
}	
echo "</table>";
echo "<br><br>";
/*
echo "<br>";
	for($k=1;$k<$nsub;$k++)
	{
		echo "subject : ".$s[$k]."    TH: ".$subc[($k*2)-1]."   TA: ".$subc[($k*2)]." <br>";
	}
*/
	echo "Total classes:".$tcount;
	echo "<br>";
	echo "No.of classes attended:".$pcount;
	$per=round((($pcount/$tcount)*100),2);
	
	if ($per>=75){
		echo "<td><p style='color:green;font-size:50px;'>Attendance:$per%</p></td>";
		echo "<td><p style='color:green;font-size:25px;'>Your attendance is sufficient.</p></td>";
		
	}
	else {
		echo "<td><p style='color:red;font-size:50px;'>Attendance:$per%</p></td>";
		echo "<td><p style='color:red;font-size:25px;'>"."Attendance is Low"."<br>"."You are likely to be detained!!!"."</p></td>";
	}
?>

</center>
</body>
</html>
