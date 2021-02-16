<?php 
	session_start();
	session_destroy();

  	unset($_SESSION['username']);

	unset(  	  $_SESSION['type'] );
    unset($_SESSION['success']);
  	header("location: index.php");

  	 ?>