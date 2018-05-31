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
  <li><a href="gui.php">Daily Attendance</a></li>
   <li><a href="cumpg2.php">Cumulative Attendance</a></li>

  <li style="float:right"><a href="index1.html">Logout</a></li>
</ul>
<br>
<center>	
<table border="1">
	<tr>
	<th rowspan="4">S.No</th>
	<th rowspan="4">HT.No</th>
<?php
	$con=mysqli_connect('localhost','username','password');
	mysqli_select_db($con,'student');
	$tid=$_POST['tid'];
	$date=$_POST['date1'];
	$date2=$_POST['date2'];
	$class=$_POST['class'];
	echo "TID: ".$tid."<br> Start Date: ".$date." <br> End Date: ".$date2."<br> Class: ".$class."<br>";
	echo "<br>";
$period = new DatePeriod(
     new DateTime($date),
     new DateInterval('P1D'),
     new DateTime($date2)
);

$pdates = array();
$pd=1;
$dates = array();
$i=1;
foreach ($period as $key => $value) {
    $dates[$i]=$value->format('Y-m-d'); 
    //echo "<br>".$dates[$i];			//-------------------------- dates obtained
    $i++;
}
$n=0;
$i=1;
$day = array();
foreach ($period as $key => $value) {
    $day[$i]=date('D', strtotime($value->format('Y-m-d')));
    //echo "<br>".$day[$i];			//----------------------------- days obtained
    $i++;
}

$nd=$i-1;
$stuatt=array();
$sql1="SELECT * FROM t_timetable where tid='".$tid."'";			//obtain t_timetable of tid
$exe1=mysqli_query($con,$sql1);

$k=1;
$periods=array();
$z=1;

//echo "<br> step1 <br>";

for($i=1;$i<=$nd;$i++)
{
	
	$q="SELECT `tid`, `day`, `p1`, `p2`, `p3`, `p4`, `p5`, `p6` FROM `t_timetable` WHERE tid='$tid' and day='$day[$i]'";		//getting timetable of each day
	$res=mysqli_query($con,$q);
//echo "<br>$q<br>";
	while($prd=mysqli_fetch_assoc($res))
	{	//echo " in the loop <br>";
		for($j=1;$j<7;$j++)
		{
			$periods[$j]=0;
		}
	
		for($j=1;$j<7;$j++)			//for each prd in a day
		{	//$stuatt[$k]=array();
			$varp="p".$j;
			//echo " <br> prd[varp] : ".$prd[$varp]."<br>";
			if($prd[$varp]==$class)
			{	//echo "<br>condn true<br>";
				$periods[$j]=1;
				$pdates[$pd]=$dates[$i]."-".$j;
				$pd++;
				$stuatt[$k]=array();

				$n++;
				$z=1;
				$q2="SELECT `".$dates[$i]."-".$j."` FROM `daily_attendance_cs3`";
				$res2=mysqli_query($con,$q2);
				
				$z=1;
				while($a=mysqli_fetch_assoc($res2))
				{	//echo "<br>".$a[$date."-".$j]."<br>";
					$stuatt[$k][$z]=$a[$dates[$i]."-".$j];	//check
					$z++;
				}
				$x=$z;
				for($z=1;$z<$x;$z++)
				{	//echo "<br> 0 given <br>";
					if($stuatt[$k][$z]!=1)
						$stuatt[$k][$z]=0;
				}
				$k++;
			}
			
		}
	}	
	
}
$ns=$z-1;

/*
echo "<br> n, ns : ".$n." ".$ns."<br>";			//------------working till here---------------

for($i=1;$i<=$n;$i++)
{
	echo "($i) : ".$pdates[$i]." ";
}

for($i=1;$i<=$ns;$i++)
{	//echo "<br>............$i.............<br>";
	for($j=1;$j<=$n;$j++)
	{
		echo $stuatt[$j][$i]."       ";
	}
}
*/
$stuatt2=array();
for($i=1;$i<=$n;$i++)
	$stuatt2[$i]=array();

for($i=1;$i<=$ns;$i++)
{	//echo "<br>............$i.............<br>";
	for($j=1;$j<=$n;$j++)
	{
		if($j!=1)
			$stuatt2[$j][$i]=$stuatt[$j][$i]+$stuatt2[$j-1][$i];
		else
			$stuatt2[$j][$i]=$stuatt[$j][$i];
	/*	if($stuatt[$j][$i]==0)
			echo "A        ";
		else
		echo $stuatt2[$j][$i]."       ";
	*/
	}
}

$pdnew=array();
$pdc=array();
$pc=array();
//echo "<br> pd: $pd <br>";
for($i=1;$i<$pd;$i++)
{
	$dt=substr($pdates[$i],-12,10);
	$pc[$i]=substr($pdates[$i],-1,1);
	$tm=strtotime($dt);
	$pdnew[$i] = date('M', $tm)." ".date('Y', $tm);
}

$pdc[1]=1;
$j=2;
for($i=2;$i<$pd;$i++)
{
	if ($pdnew[$i]==$pdnew[$i-1]) 
		continue;
	else 
	{	$pdc[$j]=$i;
		$j++;
	}
}
//echo "<br> j: $j <br>";
$c=$j;

//echo "<br> c: $c <br>";

echo ('<th></th>');
for($i=2;$i<$c;$i++)		// prints M Y
{
	echo ('<th colspan="'.($pdc[$i]-$pdc[$i-1]).'">'.$pdnew[$pdc[$i-1]]."</th>");
}
echo ('<th colspan="'.($pd-$pdc[$i-1]).'">'.$pdnew[$pdc[$i-1]]."</th>");


echo ('<th rowspan="4">TH</th>');
echo ('<th rowspan="4">TA</th>');
echo ('<th rowspan="4">%</th>');

echo ('</tr>');

echo ('<tr>');
echo ('<th>Date</th>');
for($i=1;$i<=$n;$i++)		//prints all dates
{
	$time=strtotime($pdates[$i]);
	echo ("<th>".date('d', $time)."</th>");
}

echo "</tr>";				

echo ('<tr>');
echo('<th>Period</th>');
for($i=1;$i<=$n;$i++)		//prints all prds
{
	//$time=strtotime($pdates[$i]);
	echo ("<th>".$pc[$i]."</th>");
}

echo "</tr>";	

echo "<tr>";
echo ("<th>Att Date</th>");
for($i=1;$i<=$n;$i++)		//prints all prds
	echo ("<th>".$i."</th>");
echo "</tr>";

for($y=1;$y<=$ns;$y++)
{	
	echo ("<tr>");
	echo "<td>".$y."</td>";	//s. no
	$sql1="SELECT `ht_no` FROM `daily_attendance_cs3` WHERE `s_no`=".$y;			//obtain t_timetable of tid
	
	$exe1=mysqli_query($con,$sql1);
	
	while($prd8=mysqli_fetch_assoc($exe1))
	{	
		$h=$prd8['ht_no'];
		echo "<td>".$h."</td>";	
	}
	echo('<td>'.$date.'</td>');
	for($j=1;$j<=$n;$j++)
	{
		if($stuatt[$j][$y]==0)
			echo "<td style='color:red;'>A</td>";	
		else
			echo "<td>".$stuatt2[$j][$y]."</td>";	
	}
	$v=$stuatt2[$j-1][$y];
	$pdv=$pd-1;
	echo "<td>".$pdv."</td>";
	echo "<td>".$v."</td>";
	echo "<td>".round(($v*100/$pdv),2)."</td>";
	echo "</tr>";		
}

?>
</tr>
</table>
</center>
</body>
</html>
