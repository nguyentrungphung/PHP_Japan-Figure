<?php 
	session_start();
	if(!isset($_SESSION['username']))
	{
		header("Location: index.php");
	}
	else{
        session_destroy();
        unset($_SESSION['username']);
        header("Location: index.php");
	}
?>