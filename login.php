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
a {
    color: #dd0582;
    text-decoration: none;
}
img.truste_border_none.truste_cursor_pointer{
	width: 235px;
	height: 40px;
}
/* New Image Size: 235px by 40 */
.has-text-align-right{
	display: none;
}

</style>
<title>Melvenko Login</title>
<link rel="stylesheet" href="style.css" />
</head>
<body>
<?php
	require('db.php');
	session_start();
	echo "Session ID: ".SID."<br>The current session ID is: ".session_id()."<br>COOKIE: ".$_COOKIE["PHPSESSID"];
// Set session variables
$_SESSION["favcolor"] = "green";
$_SESSION["favanimal"] = "cat";
echo "<br><br> Session variables are set.";
 $session_id = session_id();

  // Output the session ID
  //echo "The current session ID is: " . $session_id;

if (empty($_SESSION['count'])) {
   $_SESSION['count'] = 1;
} else {
   $_SESSION['count']++;
}



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
<br>
<div class="form">
<h1>Log In</h1>
<form action="" method="post" name="login">
<input type="text" name="username" placeholder="Username" required />
<input type="password" name="password" placeholder="Password" required />
<input name="submit" type="submit" value="Login" />
</form>
<p>Not registered yet? <a href='registration.php'>Register Here</a></p>

<div id="consent_blackbar"></div> 
<br><center><div id="teconsent" style="display: none;"></div></center>

<?php } 
?>



</body>
</html>
