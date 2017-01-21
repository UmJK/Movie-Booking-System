<html>
<head>
<title>Movie Booking System</title>
<script>
function SelectShow(ShowId,price)
{
	document.getElementById("Show_id").value=ShowId;
	document.getElementById("cost").value=price;
	document.getElementById("ShowSelect").submit();
}


</script>
<style>
body{
	font-family: verdana;
	color: white;
}
nav {
	position: relative;
	z-index: 2;
  position: fixed;
  width: 100%;
  top: 0;
  background: #1ab188;
	color: #1ab188;
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
  font-size: 22px;
  font-weight: 600;
  text-transform: uppercase;
  letter-spacing: .1em;
  background: #1C2331;
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
  padding: 1em 0;
  margin-right: 3em;
  font-size: 0.9em;
}
nav ul li a {
  text-decoration: none;
  color: #3F729B;
  font-size: 0.9em;
	outline: none;
}

/*-------------------------------------show date select--------------------------------------*/
.tab{
	list-style-type: none;
	padding-left: 41%;
}
.tablinks{
	list-style-type: none;
	font-family: verdana;
	outline: none;
	border-radius: 4px;
	font-size: 15px;
	font-weight: 300;
	text-transform: uppercase;
	padding: 15px 15px;
	background: #0f1e40;
	color: #ffffff;
	-webkit-transition: all 0.5s ease;
	transition: all 0.5s ease;
	-webkit-appearance: none;
	text-decoration: none;
	position: relative;
	margin: 0;
	z-index: 2;
	text-transform: uppercase;
	text-align: center;
	float: left;
	margin-right: 10px;
}
.tablinks:hover, .tablinks:focus {
	background: #03143a;
}
/*----------------------------------------button css-------------------------------*/
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
	background: #1ab188;
	color: #ffffff;
	-webkit-transition: all 0.5s ease;
	transition: all 0.5s ease;
	-webkit-appearance: none;
}
.btn:hover, .btn:focus {
	background: #179b77;
}

.btn-block {
	display: block;
	width: 100%;
}
/*----------------------------button css end---------------------------------*/
ul li .pager{
border-style:10px solid black;
font-size:100px;
}

.topright
{
	float: right;
	cursor: pointer;
	font-size: 100px;
}

.topright:hover {color: red;}
</style>
</head>
<body background="m13.jpg">
<?php
$connection=mysql_connect('localhost','root','') or die(mysql_error());
mysql_select_db('mbs',$connection);
?>
<nav id="nav">
<ul>
  <li><a  href="index.php">Home</a></li>
  <!---<li><a href="#news">News</a></li>--->
  <li><a href="contact_no.html">Contact</a></li>
  <li><a href="about.html">About</a></li>
</ul>
</nav><br><br><br><br>
<p><center><b><font face="Brush Script MT" size='100px' color="#1ab188">Select Your Show</font></b></center></p>

<ul class="tab"><center>
<?php
	session_Start();
	$movieid=$_SESSION['m'];
	$tabcount=0;
	$dates=mysql_query("select DISTINCT Date from shows where Movie_Id=$movieid");
	while($datedata=mysql_fetch_array($dates))
	{
			$datesfound[]=$datedata['Date'];
	?>
  <li><a href="javascript:void(0)" class="tablinks" onclick="openCity(event, '<?php echo $datedata['Date']; ?>')"
		 <?php if($tabcount==0){echo 'id="defaultOpen"';}$tabcount++; ?>><?php echo $datedata['Date']; ?></a></li>
	<?php
	}
	?>
</ul><br><br><br><br><br>
<form id="ShowSelect" action="seat_selector.php" method="POST" >
<input type="Hidden" id="Show_id" name="Show_id">
<?php
	for($i=0;$i<$tabcount;$i++)
	{

	?>
	<div id="<?php echo $datesfound[$i];?>" class="tabcontent">
	<?php
	$shows=mysql_query("Select * from shows where Date='$datesfound[$i]' and Movie_Id=$movieid");
	while($showdata=mysql_fetch_array($shows))
	{
	?>
	<center>
	<input class="btn" type="Button" value="<?php echo $showdata['TIME']; ?>" name="<?php echo $showdata['SHOW_ID']; ?>" id="<?php echo $showdata['SHOW_ID']; ?>" onclick="SelectShow(this.id,<?php echo $showdata['Price']; ?>)">&nbsp;&nbsp;Price:-<?php echo $showdata['Price']; ?><br>
	<?php
	}
	?>
	</div>
	<?php
	}
	?>
	<input type="hidden" id="cost" name="cost"></center>
</form>
<script>
function openCity(evt, Date) {
    var i, tabcontent, tablinks;
    tabcontent = document.getElementsByClassName("tabcontent");
    for (i = 0; i < tabcontent.length; i++) {
        tabcontent[i].style.display = "none";
    }
    tablinks = document.getElementsByClassName("tablinks");
    for (i = 0; i < tablinks.length; i++) {
        tablinks[i].className = tablinks[i].className.replace(" active", "");
    }
    document.getElementById(Date).style.display = "block";
    evt.currentTarget.className += " active";
}

// Get the element with id="defaultOpen" and click on it
document.getElementById("defaultOpen").click();
</script>
</body>
</html>
