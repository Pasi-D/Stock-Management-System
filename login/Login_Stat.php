<?php 
	session_start();


	$dbhost = "localhost";
	$dbuser = "root";
	$dbpass = "123";
	$db_name = "stock_inventory";

	$non=mysqli_connect($dbhost,$dbuser,$dbpass,$db_name) or die("Can't connect to server");

	//Get values passed from index.html
	$usrname = $_POST['Username'];
	$pwd = $_POST['password'];
 ?>