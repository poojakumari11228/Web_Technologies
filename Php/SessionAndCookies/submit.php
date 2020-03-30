<?php 	
// Start the session
session_start();
if (isset($_POST['submit'])) {

	echo "submit";
	// if remember me is set thn using cookies else session
	if (isset($_POST['remember'])) {
		# code...
		echo "remember";
		setcookie('uname',$_POST['username']);
	}
	else{
		$_SESSION['uname']=$_POST['username'];;
	}
	// redirect to welcome page
	header("location:welcome.php");
}

// 
if ($_GET['logout']==1) {
	# code...
	if (isset($_SESSION['uname']))
		session_destroy();
	if (isset($_COOKIE['uname'])) {
		// set the expiration date to one hour ago
		setcookie("uname", "", time() - 3600);
	}
	header("location:index.html");	
}
 ?>