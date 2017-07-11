<?php
$connection = mysqli_connect('localhost', 'root', '123'); #Make changes here
if(!$connection){
	die("Database Connection Failed" . mysqli_error($connection));
}
$select_db = mysqli_select_db($connection, 'stock_inventory');
if(!$select_db){
	die("Database Selection Failed" . mysqli_error($connection));
}
?>