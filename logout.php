<?php
session_name('sql_session');
session_start();
session_destroy();
header('Location: index.php');
session_write_close();
?>