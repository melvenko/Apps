<?php

?>
<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
<script src=//consent.trustarc.com/notice?domain=trustarc.com&c=teconsent&js=bb&noticeType=bb&pcookie></script>
<style>
.truste_caIcon_display
{
        font-size: small;
}
img.truste_border_none.truste_cursor_pointer{
        width: 235px;
        height: 40px;
}

</style>
<title>Melvenko Login</title>
<link rel="stylesheet" href="style.css" />
</head>
<body>
<?php
	require('db.php');
	session_start();
    // If form submitted, insert values into the database.
    if (isset($_POST['username'])){
		
		$username = stripslashes($_REQUEST['username']); // removes backslashes
		$username = mysqli_real_escape_string($con,$username); //escapes special characters in a string
		$password = stripslashes($_REQUEST['password']);
		$password = mysqli_real_escape_string($con,$password);
		
	//Checking is user existing in the database or not
        $query = "SELECT * FROM `admin_user` WHERE username='$username' and password='".md5($password)."'";
		$result = mysqli_query($con,$query) or die(mysql_error());
		$rows = mysqli_num_rows($result);
        if($rows==1){
			$_SESSION['username'] = $username;
			header("Location: /dashboard.php"); // Redirect user to index.php
            }else{
				echo "<div class='form'><h3>Username/password is incorrect.</h3><br/>Click here to <a href='login.php'>Login</a></div>";
				}
    }else{
?>
<img src="/logo.png" style="width:251px;height:39.5px;">
<div class="form">
<h1>Log In</h1>
<form action="" method="post" name="login">
<input type="text" name="username" placeholder="Username" required />
<input type="password" name="password" placeholder="Password" required />
<input name="submit" type="submit" value="Login" />
</form>
<p>Not registered yet? <a href='registration.php'>Register Here</a></p>
<br><div id="consent_blackbar"></div> 
<p><div id="teconsent" style="display: none;"></div></p>


<?php } 
?>


</body>
</html>
