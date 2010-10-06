<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<?php 
	if (!isset($_COOKIE['user']) || $_COOKIE['user'] != "saplen" ) {
		echo "<SCRIPT LANGUAGE='JavaScript'>"; 
		echo "location.href='login.php';"; 
		echo "</SCRIPT>"; 
		exit;
	} 
?>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Saplen</title>
</head>
	<frameset cols="*,1024,*">
		<frame src="about:blank"></frame>
		<frameset cols="*" rows="136, *" id="frame_main"  border="0">
			<frame src="header.php" noresize="noresize" name="header">
			<frame src="main.html" name="main">
		</frameset>
		<frame src="about:blank"></frame>
	</frameset>

	<noframes>
	<body>

	</body>
	</noframes>

</html>
