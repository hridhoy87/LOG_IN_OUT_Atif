<?php
session_name('sql_session');
session_start();
if (isset($_SESSION['s_auth_var']))header('Location: home.php');
else{
	echo '
	<html>
	<div align=center>
		<form action="login.php" method="POST">
		<input type="text" name="username"><br>
		<input type="password" name="password"><br>
		<input type="submit" value="Login">
		</form><br>
	';
	if(isset($_GET['message']))echo $_GET['message'];
	echo '</div>
	</html>';
}
session_write_close();
?>