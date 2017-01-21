<?php
	$connection=mysql_connect("localhost","root","")or die(mysql_error());
	mysql_select_db("mbs",$connection);
	$id=$_POST['ID_Clicked'];
	session_Start();
	$_SESSION['m']=$id;
	$sql="select Trailer from movie_details where id=$id";
	$Trail=mysql_query($sql,$connection);
	$Traillink=mysql_fetch_array($Trail);
	$file=fopen("summary/".$id.".txt",'r');
?>
<html>
<head>
<style>
html {
   background: url(.jpg) no-repeat center center fixed;
  -webkit-background-size: cover;
  -moz-background-size: cover;
  -o-background-size: cover;
  background-size: cover;
}

img{
    max-width:20%;
    max-height:20%;
    border-radius: 80%;
}

body {
	margin:0;
	font-family: verdana;
}
nav {
	position: relative;
	z-index: 2;
  position: fixed;
  width: 100%;
  top: 0;
	color: #ffffff;
	background: #1ab188;
  -webkit-transition: all 650ms cubic-bezier(0.22, 1, 0.25, 1);
  transition: all 650ms cubic-bezier(0.22, 1, 0.25, 1);
}
nav:before {
  content: "";
  display: block;
  position: absolute;
  background: rgba(0, 0, 0, 0.27);
  top: 0;
  left: 0;
  z-index: 1;
}
nav ul {
	font-family: verdana;
	border: 0;
  outline: none;
  border-radius: 0;
  font-size: 20px;
  font-weight: 600;
  text-transform: uppercase;
	background: #1C2331;
  letter-spacing: .1em;
  color: #ffffff;
  -webkit-transition: all 0.5s ease;
  transition: all 0.5s ease;
  -webkit-appearance: none;
  position: relative;
  margin: 0;
  z-index: 2;
  text-transform: uppercase;
  text-align: center;
}
nav ul li {
  display: inline-block;
  padding: 21px 15px;
  margin-right: 3em;
  font-size: 0.9em;
}
nav ul li a {
  text-decoration: none;
  color: #3F729B;
  font-size: 0.9em;
	outline: none;
}
.btn {
	border: 0;
	outline: none;
	border-radius: 4px;
	padding: 12px 15px;
	font-family: verdana;
	font-size: 18px;
	font-weight: 600;
	text-transform: uppercase;
	letter-spacing: .1em;
	background: #162648;
	color: #ffffff;
	-webkit-transition: all 0.5s ease;
	transition: all 0.5s ease;
	-webkit-appearance: none;
}
.btn:hover, .btn:focus {
	background: #03143a;
}

.btn-block {
	display: block;
	width: 100%;
}
h3{
	color: #3F729B;
}
font{
	color: #1ab188;
}

</style>
</head>
<body background="m13.jpg">
<nav id="nav">
<ul>
  <li><a href="try4.php">HOME</a></li>
  <li><a href="#trends">TRENDS</a></li>
  <li><a href="#today">NOW SHOWING</a></li>
  <li><a href="contact_no.html">CONTACT US</a></li>
	<li><a href="#book"><font color="#c42727">BOOK TICKETS</font></a></li>
  <li class="icon">
    <a href="javascript:void(0);" style="font-size:15px;" onclick="myFunction()">?</a>
  </li>
</ul>
</nav><br><br>
<script>
function myFunction() {
    var x = document.getElementById("myTopnav");
    if (x.className === "topnav") {
        x.className += " responsive";
    } else {
        x.className = "topnav";
    }
}
</script>
<div style="margin-left:200px;margin-right:200px;"><br><br><br>
<iframe width="900" height="500" src="https://www.youtube.com/embed/<?php echo $Traillink['Trailer']; ?>"></iframe></div>
<br><br><br>
<div style="margin-left:200px">
<h3><span class="glyphicon glyphicon-user"></span>CAST</h3>
<font size="4px"><?php echo fgets($file). "<br />";?></font>
<h3>GENRES</h3><font size="4px">
<?php echo fgets($file). "<br />"; ?></font> <br>
</div>
<div style="margin-left:200px;margin-right:200px;">
<h3>SUMMARY</h3>
<font size="4px">
<?php echo fgets($file). "<br />"; ?>
</font>

<br><br><br>
<a href="login.php">
<input class="btn" type="button" value="BOOK  SHOW"></a>
<br><br><br><br>
</div>
<form>
	<a href="try4.php"><font size="1px">LOGOUT</font></a>
</form>
</body>
</html>
