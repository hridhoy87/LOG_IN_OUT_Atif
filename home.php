<?php
session_name('sql_session');
session_start();
if (!isset($_SESSION['s_auth_var'])){header('Location: index.php');}
else {

echo '<html>
<div align=center>
	Welcome, '.$_SESSION['authenticated_username'].'<br>
	<a href="logout.php">Logout</a>
</div>
</html>';


}
session_write_close();
?>
