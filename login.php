<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<script type="text/javascript" async="async" crossorigin src='//consent.trustarc.com/notice?domain=melventest.com&c=teconsent&js=nj&noticeType=bb&text=true&gtm=1'></script>
<script src="https://consent.trustarc.com/autoblockasset/core.min.js?domain=melventest.com"></script>
<script src="https://consent.trustarc.com/autoblockoptout?domain=melventest.com"></script>
	
<!-- Google Tag Manager -->
<script>(function(w,d,s,l,i){w[l]=w[l]||[];w[l].push({'gtm.start':
new Date().getTime(),event:'gtm.js'});var f=d.getElementsByTagName(s)[0],
j=d.createElement(s),dl=l!='dataLayer'?'&l='+l:'';j.async=true;j.src=
'https://www.googletagmanager.com/gtm.js?id='+i+dl;f.parentNode.insertBefore(j,f);
})(window,document,'script','dataLayer','GTM-WQLLZBP3');</script>
<!-- End Google Tag Manager -->
	
<style>
	
body {
            margin: 0;
            padding: 0;
            font-family: Arial, sans-serif;
            background: linear-gradient(135deg, #3498db, #e74c3c);
            /* Adjust the gradient colors and direction as desired */
            min-height: 100vh;
            display: flex;
            align-items: center;
            justify-content: center;
            color: white;
/*             text-align: center; */
        }
.indent-1 {float: left;}
.indent-1 section {width: 50%; float: left;}
	
.truste_caIcon_display
{
        font-size: small;
}
img.truste_border_none.truste_cursor_pointer{
        width: 235px;
        height: 40px;
}
#irm-id-034807222535100246{
	display: none;
}
#YTvideo{
	float: left;
/* 	border: 1 px solid #000; */
}
.logo {
	float: left;
	height: 45px;
	width: 49%;
	padding: 2px;
/* 	border: 1px solid #000; */
}
.nav{
	float: right;
	height: 45px;
	width: 49%;
	padding: 2px;
/* 	border: 1px solid #d13906; */
}
#main{
/* 	border: 2px solid #051663; */
	height: auto;
	padding: 5px;
}
#header{
	padding: 5px;
	height: 45px;
/* 	border: 1px solid #056312; */
	
}
#footer{
	float: left;	
}
#consent_blackbar{
	background-color: rgb(255, 0, 0);opacity:0.6;
	height: 100px;
}
#google-ads{
	float:left;
}
</style>
<title>Melvenko PHP Form</title>
<link rel="stylesheet" href="style.css" />
</head>
<body>
<div id="container">
	<div id="header">
		<div class="nav"></div>
		<div class="logo"><img src="/logo.png" style="width:251px;height:39.5px;"></div>
	</div>
	<div id="main">
<?php

?>

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

	    <section class="indent-1">
    		<!-- Section 1 --> 
    		<section>
        	    <div class="form">
			<h1>Log In</h1>
			<form action="" method="post" name="login">
			<input type="text" name="username" placeholder="Username" required />
			<input type="password" name="password" placeholder="Password" required />
			<input name="submit" type="submit" value="Login" />
			</form>
			<p>Not registered yet? <a href='registration.php'>Register Here</a></p>
			<p><div id="teconsent" style="display: none;"></div></p>
			<p><div class="fb-like" data-href="https://developers.facebook.com/docs/plugins/" data-width="" data-layout="" data-action="" data-size="" data-share="true"></div></p>
		    </div>
    		</section>

    		<!-- Section 2 -->
    		<section>	
        		<div id="YTvideo" class="reg-elements">
			    <iframe width="560" height="315" src="https://www.youtube.com/embed/Lffeb73sCx4?si=-POMG6FvYqrxIEmS" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share" allowfullscreen></iframe>
			</div>
    		</section>
	    </section>  

<?php } 
?>
		<!--original placement of google ads-->
	<div id="footer">
		<div id="consent_blackbar"></div> 
	</div>
</div>
</body>
</html>
