<?php
 $connection=mysql_connect('localhost','root','') or die(mysql_error());
 mysql_select_db('mbs',$connection);
 session_start();
 if(isset($_POST['fname']))
 {
	 $f_name=$_POST['fname'];
	 $l_name=$_POST['lname'];
	 $u_email=$_POST['useremail'];
	 $pswd=$_POST['pass'];
	 $sql="insert into user_details values('$f_name','$l_name','$u_email','$pswd')";
		$search="select * from user_details where Email_Id='$u_email'";
		$exist=mysql_query($search,$connection);
		if(mysql_fetch_array($exist))
		{
			echo '<script> alert("Username already exist") </script>';
		}
		else
		{
			$result=mysql_query($sql,$connection);
			if($result)
			{
        $_SESSION['useremail']=$u_email;
				header("Location:SelectShow.php");
			}
		}
 }
 if(isset($_SESSION['useremail']))
 {
	 header("Location:SelectShow.php");
 }
 if(isset($_POST['useremail']))
 {
	$flag=0;
	$U_Email=$_POST['useremail'];
	$Pswd=$_POST['pass'];
	$sql="select Password from user_details where Email_Id='$U_Email'";
	$result=mysql_query($sql,$connection) or die(mysql_error());
	$row=mysql_fetch_array($result);
	if(strcmp($Pswd,$row['Password'])==0 && $U_Email!='' && $Pswd!='')
	{
		$_SESSION['useremail']=$U_Email;
		header("Location:SelectShow.php");
	}
	else
	{
		$_SESSION['invalid']=1;
		header("Location:login.php");
	}
 }
	?>

<!DOCTYPE html>
<html >
  <head>
    <meta charset="UTF-8">
    <title>Sign-Up/Login Form</title>
    <link href='http://fonts.googleapis.com/css?family=Titillium+Web:400,300,600' rel='stylesheet' type='text/css'>

    <link rel="stylesheet" href="login/css/normalize.css">


        <link rel="stylesheet" href="login/css/loginstyle.css">
		<?php
		if(isset($_SESSION['invalid']))
		{
		?>
		<script language="javascript">
		alert("invalid Username or Password");
		</script>
		<?php
		}
		?>
  </head>

  <body>

    <div class="form">
      <ul class="tab-group">
        <li class="tab"><a href="#signup">Sign Up</a></li>
        <li class="tab active"><a href="#login">Log In</a></li>
      </ul>

      <div class="tab-content">
        <div id="login">
          <h1>Welcome Back!</h1>

          <form action="login.php" method="post">

            <div class="field-wrap">
            <label>
              Email Address<span class="req">*</span>
            </label>
            <input type="email" id="useremail" name="useremail" required autocomplete="on"/>
          </div>

          <div class="field-wrap">
            <label>
              Password<span class="req">*</span>
            </label>
            <input type="password" id="pass" name="pass" required autocomplete="off"/>
          </div>
          <p id="invalid" ></p>
          <p class="forgot"><a href="#">Forgot Password?</a></p>

          <button class="button button-block"/>Log In</button>

          </form>

        </div>
		<div id="signup">
          <h1>Sign Up for Free</h1>

          <form action="login.php" method="post">

          <div class="top-row">
            <div class="field-wrap">
              <label>
                First Name<span class="req">*</span>
              </label>
              <input type="text" id="fname" name="fname" required autocomplete="off" />
            </div>

            <div class="field-wrap">
              <label>
                Last Name<span class="req">*</span>
              </label>
              <input type="text" id="lname" name="lname" required autocomplete="off"/>
            </div>
          </div>

          <div class="field-wrap">
            <label>
              Email Address<span class="req">*</span>
            </label>
            <input type="email" id="useremail" name="useremail" required autocomplete="off"/>
          </div>

          <div class="field-wrap">
            <label>
              Set A Password<span class="req">*</span>
            </label>
            <input type="password" id="pass" name="pass" required autocomplete="off"/>
          </div>

          <button type="submit" class="button button-block"/>Get Started</button>

          </form>

        </div>


      </div><!-- tab-content -->

</div> <!-- /form -->
    <script src='http://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js'></script>

        <script src="login/js/loginjs.js"></script>



  </body>
</html>
