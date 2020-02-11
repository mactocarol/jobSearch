<?php
session_start();
		 
		if(empty($_SESSION['logged_in']))
		{
			header("location:login.php");
			exit;
		}
		else
		{
			$user_id = $_SESSION['user_id'];
			// $points = $_SESSION['points'];
			
		}

	?>