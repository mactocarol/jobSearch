<?php
$servername="localhost";
$username="root";
$password="";
$dbname="job_search";

$conn=new mysqli($servername,$username,$password,$dbname);

if ($conn->connect_error) {
	
	die("connection failed:" .$conn->connect_error);
}
if(!isset($_SESSION))
	{
		session_start();
	}
?>