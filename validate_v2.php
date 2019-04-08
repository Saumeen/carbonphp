<!DOCTYPE html>
<html>
<head>
	<title>login</title>
	<link rel="Stylesheet" href="css/ssip_theme.css">
	<link rel="stylesheet" href="css/style.css">
</head>
<body>

<nav class="navbar navbar-expand-sm navbar-light " style="background-color: #1C1E26;"  id="colorbar">
  &nbsp&nbsp<a href="#"> <font size="5" color="white">SSS MALL</font></a> <br><br>
</nav>
<br><br>
<div id="main">

<div id="title">
<h3>WELCOME TO SSS MALL ENTER THE CREDENTIALS FOR ENTERING DATA</h3>	

</div>
<br><br>
<div class="container" >
	
	<form method="post" action="login.php">
       
        <div id="username"><font color="black" size="5">Username :</font> <input class="user" type="text" name="email" id="email" required=""> <br></div>
	<div id="password"><font color="black" size="5">Password :</font> <input class="user" type="password" name="password" id="pass" required=""><br></div>
	<div id="rememberme"><font color="black" size="5">Remember me </font><input type="checkbox" name="remember"><br></div>
	<div id="submit"><input type="submit" name="login" value="Login" class="btn btn-info"></div>
	<!-- <button class=" btn btn" name="login" value="login" type="submit">login</button> -->
	
</form>

</div>

 <?php 
if(isset ($_COOKIE['email']) and isset($_COOKIE['pass']))
{
$email=$_COOKIE['email'];
 $pass= $_COOKIE['pass'];
 echo "<script> 
 
 document.getElementById('email').value='$email';
 document.getElementById('pass').value='$pass';
</script>";
}
 ?>


</body>
</html>