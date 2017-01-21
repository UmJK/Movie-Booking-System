<?php
$connection=mysql_connect('localhost','root','') or die(mysql_error());
mysql_select_db('mbs',$connection)  or die(mysql_error());
$seats_occupied=mysql_query("select * from shows where SHOW_ID=".$_POST["showid"]) or die(mysql_error());
$seats_occupied_data=mysql_fetch_array($seats_occupied);
$seats_occupied_data['seats_occupied']=$seats_occupied_data['seats_occupied'].$_POST['seatno'];
echo $seats_occupied['seats_occupied'];
ECHO $_POST['seatno'];
mysql_query("UPDATE shows set seats_occupied='".$seats_occupied_data['seats_occupied']."' where SHOW_ID=".$_POST['showid']) or die(mysql_error());
header('Location:payment.html');
?>