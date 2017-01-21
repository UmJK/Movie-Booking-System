<?php
	$connection=mysql_connect('localhost','root','') or die(mysql_error());
	mysql_select_db('mbs',$connection);
	$occs=mysql_query("select seats_occupied from shows where SHOW_ID=".$_POST['Show_id']) or die(mysql_error());
	$data=mysql_fetch_row($occs);
	$occ=explode(",",$data[0]);
?>


<html>
<head>
<title>Seat Select</title>
<link rel="stylesheet" type="text/css" href="VKpbyP.css">
<script>
	function updateseat(obj)
	{
		document.getElementById("showid").value=<?php echo $_POST['Show_id']; ?>;
		if(obj.checked)
		{
			addseat(obj.id);
			document.getElementById("cost").value=parseInt(document.getElementById("cost").value)+parseInt(<?php echo $_POST['cost']; ?>);
		}
		else
		{
			removeseat(obj.id);
			document.getElementById("cost").value=parseInt(document.getElementById("cost").value)-parseInt(<?php echo $_POST['cost']; ?>);
		}
	}
	function addseat(id)
	{
		var seats_str=document.getElementById("seatno").value;
		seats_str+=","+id;
		document.getElementById("seatno").value=seats_str;
	}
	function removeseat(id)
	{
		var seats_str=document.getElementById("seatno").value;
		var seats_arr=seats_str.split(",");
		//document.write(seats_arr[2]);
		var index=seats_arr.indexOf(id);
		seats_arr.splice(index,1);
		seats_str=seats_arr.join();
		document.getElementById("seatno").value=seats_str;
	}
</script>
</head>
<body>
<form method="post" action="bookseat.php">
<div class="plane">
  <div class="cockpit">
    <h1>Screen This Way</h1>
  </div>
  <ol class="cabin fuselage">
  <?php
	for ($k=1;$k<=10;$k++)
	{
		?>
		<li class="row row--<?php echo $k;?>">
		<ol class="seats" type="A">
	  
	  <?php
		$j=chr($k+64);
		for($i=1;$i<=30;$i++)
		{
		
		?>
			<li class="seat">
			  <input type="checkbox" <?php if (in_array($i.$j,$occ)){echo "disabled ";} echo "id='$i"."$j'"; ?> onclick="updateseat(this);"/>
			  <label for=<?php echo $i.$j;?>>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</label>
			</li>
		<?php	
			if($i%5==0 && $i!=0)
				echo "&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;";
		}
		?>
		</ol>
		</li>
		<?php
	
	}
	?>
  </ol>
  <div class="fuselage">
    
  </div>
 
</div>
<input type="hidden" name="showid" id="showid">
<input type="hidden" name="seatno" id="seatno">
<input type="text" name="cost" id="cost" value="0">
  <input type="Submit"  class="button" name="bookseats" id="bookseats" value="checkout">
 </form>
</body>
</html>