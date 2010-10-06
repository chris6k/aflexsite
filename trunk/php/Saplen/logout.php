<?php
	if(isset($_COOKIE["user"])){
		setcookie("user", "", time()-3600);
		Header("Location: login.php");
	}
?>
