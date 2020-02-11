<?php include 'connection.php'; ?>
<?php
	if (session_destroy())
	{
		header("Location: login.php");
	}

?>