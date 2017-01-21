<?php
$connection=mysql_connect('localhost','root','') or die(mysql_error());
mysql_select_db('mbs',$connection);
?>
<!DOCTYPE html>
<html>
<style>
html{
   background: current-color;
   -webkit-background-size:cover;
   -moz-background-size:cover;
   -o-background-size:cover;
   background-size:cover;
}
</style>
<head>
  <link rel="icon" href="icon.png">
 <link rel="stylesheet" type="text/css" href="try4.css">
<meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="bootstrap-3.3.7/dist/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
  <script src="bootstrap-3.3.7/dist/js/bootstrap.min.js"></script>
  <title>Movie Registration</title>

  <script>
  function getdetails(id)
  {
	  document.getElementById("ID_Clicked").value=id;
	  document.getElementById("movies").submit();
  }
  </script>
</head>
<body background="m13.jpg">
  <script>document.write('<script src="http://' + (location.host || 'localhost').split(':')[0] + ':35729/livereload.js?snipver=1"></' + 'script>')</script>
<!--------------------------Navigation Bar------------------------------------------------------------------------------------------------>
<nav id="nav">
<ul>
  <li><a class="active" href="#home">Home</a></li>
  <!---<li><a href="#news">News</a></li>--->
  <li><a href="contact_no.html">Contact</a></li>
  <li><a href="about.html">About</a></li>
<?php
  session_Start();
  if(isset($_SESSION['useremail']))
  {
    ?>
    <li><a href="logout.php">LogOut</a></li>
    <?php
  }
  else {

  ?>
  <li><a href="login.php">LogIn</a></li>
  <?php
  }
  ?>
</ul>
</nav><br><br><br><br>
<!-----------------------------------------------Navigation Bar Ends---------------------------------------------------------------------------------->

<div class="container">
  <br>
  <div id="myCarousel" class="carousel slide" data-ride="carousel">
    <!-- Indicators -->
	    <ol class="carousel-indicators">
		<li data-target="#myCarousel" data-slide-to="0" class="active"></li>
	<?php
	$movies=mysql_query("select * from movie_details where now_showing=1");
	$moviecount=mysql_num_rows($movies);
	for($i=1;$i<$moviecount;$i++)
	{
	?>
      <li data-target="#myCarousel" data-slide-to=<?php echo '"'.$i.'"'; ?>"></li>
	<?php
	}
	?>
    </ol>

    <!-- Wrapper for slides -->
    <div class="carousel-inner" role="listbox">
	<?php
		$count=0;
		mysql_data_seek($movies,0);
		while($moviedata=mysql_fetch_array($movies))
		{
			?>
			<div class="<?php if($count==0) { echo 'item active';$count++; } else { echo 'item';} ?>">
				<img src="<?php echo 'images/'.$moviedata[0].'.jpg'; ?>" width="460" height="200">
			</div>
		<?php
		}
		?>
    </div>

    <!-- Left and right controls -->
    <a class="left carousel-control" href="#myCarousel" role="button" data-slide="prev">
      <span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span>
      <span class="sr-only">Previous</span>
    </a>
    <a class="right carousel-control" href="#myCarousel" role="button" data-slide="next">
      <span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span>
      <span class="sr-only">Next</span>
    </a>
  </div>
</div>


<!-----------------------------------------------------Code for bootstrap ends-------------------------------------------------------------------->


<!--List Of Movies-->
<div class="tiles">
<form action="moviedetails.php" method="POST" id="movies">
<input type="hidden" id="ID_Clicked" name="ID_Clicked">
<table>
<?php
	$count=0;
	mysql_data_seek($movies,0);
	while($moviedata=mysql_fetch_array($movies))
	{
		if ($count%4==0)
			echo '<tr>';
			$count++;
		?>
	<td><a class="tile"><img id="<?php echo $moviedata[0]; ?>"  src="<?php echo 'images/'.$moviedata[0].'.jpg'; ?>" height="200" width="200" onclick="getdetails(this.id)"/>
      <div class="details">
	    <span class="title"><?php echo $moviedata['Name'];?></span>
	       <span class="info"><?php echo $moviedata['Info'];?></span>
	  </div>
	</a></td>
		<?php
		if($count%4==0)
		{echo '</tr>';}
	}
		?>
</table>
<script src="js/index.js"></script>
</form>
</div>
</body>
</html>
