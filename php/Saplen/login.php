<?php		

		//check cookie
		if (isset ($_COOKIE["user"])) {
			if ($_COOKIE["user"] == "saplen") {
				setcookie("user", "saplen", time() + 3600 * 24);
				Header("Location: index.php");
				exit;
			}
		}
		
		$error = false;
		/*
		 * Created on 2010-9-23
		 *
		 * To change the template for this generated file go to
		 * Window - Preferences - PHPeclipse - PHP - Code Templates
		 */
		//check form data
		if (isset ($_POST["username"]) && isset ($_POST["password"])) {
			$username = $_POST["username"];
			$password = $_POST["password"];

			if ($username == "saplen" && $password == "123456789") {
				setcookie("user", "saplen", time() + 3600 * 24);
				Header("Location: index.php");
				exit;
			} else {
				$error = true;
			}
		}
		

?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Login</title>
<style type="text/css">
#all {margin-left:auto; margin-right:auto; text-align: center;width: 540px;}
body {text-align:center;}
#main {background:url(images/login_mid.gif); height:240px; text-align:center;}
#title {height:66px;margin-top: 120px;}
#login { margin-top: 32px; width: 420px; margin-left: auto; margin-right:auto;}
#btm_left {background:url(images/login_btm_left.gif) no-repeat; width:21px; float:left;}
#btm_mid {background:url(images/login_btm_mid.gif); width:498px; float:left;}
#btm_right {background:url(images/login_btm_right.gif) no-repeat; width:21px; float:left;}
</style>
<script type="text/javascript" language="javascript">
function reset_form()
{
	document.getElementById('username').value = '';
	document.getElementById('password').value = '';
	return false;
}
					 
</script>
</head>

<body>
<div id="all">
	<div id="message">
			<?php 
				if($error) {
					echo 'incorrect username or password!';
				}
			?>	
	</div>
    <div id="title"><img src="images/login_title.gif" /></div>
    <div id="main">
    	<form action="login.php" method="post" id="login_form" name="login_form">
        <table id="login">
        	<tr>
            	<td>U S E R N A M E  </td>
                <td><input type="text" name="username" id="username" size="32" style="background:url(images/username_bg.gif) left no-repeat #FFF; border:1px #ccc solid;height: 20px; font-family:Arial, Helvetica, sans-serif; font-size:14px; font-weight: 800; margin:0; padding-left: 24px;" /></td>
            </tr>
            <tr><td></td><td></td></tr>
            <tr><td></td><td></td></tr>
            <tr>
            	<td>P A S S W O R D  </td>
                <td><input type="password" name="password" id="password" size="32" style="background:url(images/password_bg.gif) left no-repeat #FFF; border: 1px #ccc solid; height: 20px; font-family:Arial, Helvetica, sans-serif; font-size:14px; font-weight: 800; margin:0; padding-left: 24px;" /></td>
            </tr>
            <tr>
            	<td></td>
            	<td style="text-align: left; padding-top: 32px;">
                	<input type="image" src="images/login.gif" name="submit" onclick="javascript:document.getElementById('login_form').submit();" />&nbsp;&nbsp;&nbsp;
                    <input type="image" src="images/cancel.gif" name="cancel" onclick="reset_form();" />
                </td>
            </tr>
        </table>
    </div>
    <div id="btm">
        <div id="btm_left"></div>
        <div id="btm_mid"></div>
        <div id="btm_right"></div>
    </div>
</div>
</body>
</html>
