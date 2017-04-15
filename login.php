<?php
session_name('sql_session');
session_start();

$host = 'localhost';
$username = 'user';
$password = 'abcd1234';
$dbname = 'user_login_info';


if (isset($_SESSION['s_auth_var']))header('Location: home.php');
else{
	if(isset($_POST['username']) && !empty($_POST['username']) && isset($_POST['password']) && !empty($_POST['password'])){
		$mysqli = new mysqli($host, $username, $password, $dbname);
		$stmt= $mysqli -> prepare("SELECT password FROM login_table WHERE username = ?");
		$stmt->bind_param('s',$_POST['username']);
		$stmt->execute();
		$stmt->bind_result($pw);
		$stmt->fetch();
   		$stmt->close();
    	$mysqli->close();
    	if($_POST['password']==$pw){

			$_SESSION['s_auth_var']='a_random_string';
			$_SESSION['authenticated_username']=$_POST['username'];
			session_regenerate_id();
			header ('Location: home.php');

    	}
    	else header('Location: index.php?message=Wrong password.');
	}
	else header('Location: index.php?message=Enter username and password.');
}

session_write_close();
?>