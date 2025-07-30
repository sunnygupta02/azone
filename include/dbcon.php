<?php

	//server details, goes here

	$server = "localhost";
	$user	= "root";
	$password = "";
	$database	= "azone";
	$conn = null;

	$conn = mysqli_connect($server,$user,$password,$database);

	if (!$conn) {
		die("❌ Connection failed: " . mysqli_connect_error());
	}
?>