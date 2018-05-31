<?php
session_start();
?>
<!DOCTYPE html>
<html>
<head>
	<title>Student Login</title>
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
    font-weight: 50px;
    text-decoration: none;
}

li a:hover:not(.active) {
    background-color: white;
}

li a.active {
    color: white;
    background-color: #4CAF50;
}

		td{
		    font-family: "Open Sans",sans-serif,sans-serif;	
			font-size: 25px;
			padding: 15px;
			font-size: 20px;
		}
		input{
			padding: 5px 20px 5px 10px;
			
		}
		div{
			position:fixed;
		}
		
#nnn
{
text-align: center;
    float:center;
    padding-top:100px;
    padding-right:400px;
    padding-left:500px;
    height:400px;
    width:400px;
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
}
	</style>
	<title></title>
</head>
<body bgcolor="white">

<header style="padding-left: 400px"><img src="header_inside.jpg"></header>

<ul>
  <li><a href="index1.html">Home</a></li>
  <li><a class="active" href="sloginf.php">Student Login</a></li>
  <li><a href="loginf.php">Faculty Login</a></li>
  <li><a href="rformf.html">Faculty Registration</a></li>
</ul>

	
	
	<div id="nnn" align="center">
<form method="post" action="svalid.php" >
<table border="0" align="center">
<caption><b><font size="6" >Student Login</font></b></caption>
			<tr><td>Username</td>
				
					<td><input type="text" name="uname" id="myname" onblur="validname()"></td>
<td><p id="namef"></p></td>
<td><p id="vname" style="font-size: 18px; display: inline; color: white;"></p></td>
					</tr>
			<tr><td>Password</td>
				<td><input type="password" name="tpassword" id="pword" onblur="validpword()"></td>
</td><td><p id="namef"></p></td>
<td><p id="vpword" style="font-size: 18px; display: inline; color: white;"></p></td>
					</tr>
			<tr><td colspan="3"><input type="submit" name="login" value="LOGIN" /></td></tr>
		</table>
	</form>
</div>
<script>
function validname()
{
	var mn=document.getElementById("myname").value;
		    var actualname=/^[0-9]+$/;
		    if(!actualname.test(mn))   {  var hp1=document.getElementById("vname");
		    hp1.style.color="red";  
		    	document.getElementById("vname").innerHTML="Invalid name.";     }
}
function validpword()
{
	var pw=document.getElementById("vpword").value;
	var actualpword=/^(((?=.*[a-z])(?=.*[A-Z]))|((?=.*[a-z])(?=.*[0-9]))|((?=.*[A-Z])(?=.*[0-9])))/;
				if(!actualpword.test(pword))
				{
					document.getElementById("vpword").innerHTML="Password too weak!";
				}
				else
			{
				document.getElementById("vpword").innerHTML="";
			}
}
</script>

</body>
</html>