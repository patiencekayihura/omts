<?php
require_once "../config/db-connection.php";
session_start();
if (!isset($_SESSION['user_id'])) {
	$currentPage = basename($_SERVER['PHP_SELF']);
	if ($currentPage !== 'login.php' && $currentPage !== 'index.php'){
		header("Location:../login.php");
	}
} else if (!($_SESSION['user_type'] === 'admin')) {
	$currentPage = basename($_SERVER['PHP_SELF']);
	if ($currentPage !== 'login.php' && $currentPage !== 'index.php'){
		header("Location:../login.php");
	}
}
?>
<!DOCTYPE html>
<html>
<head>
	<title>Online Massage Therapy</title>
	<link rel="stylesheet" type="text/css" href="css/main.css">
	<style>
		* {
	margin: 0;
	padding: 0;
}
html, body {
	height: 100%;
	font-family: Arial, Helvetica, sans-serif;
}
 .wrapper {
	 min-height: 100%;
	 margin: auto;
 }
 .container {
 	padding-bottom: 100px;

 }
 .footer {
 	height: 100px;
 	position: relative;
 	bottom: 0;
 	clear: both;
 	background-color: rgba(0,0,0,.7);
 	margin-top: -100px;
 	text-align: center;
 	color: white;
 }
 .logo {
 	justify-content: flex-start;
 }
 .text-center {
	 text-align: center;
 }
 .text-input {
	 height: 25px;
	 border-radius: 2px;
	 border: 1px solid gray;
	 min-width: 300px;
	 padding-left: 5px;
 }
 button, .button {
	 height: 30px;
	 border-radius: 1px;
	 border: 1px solid #333;
	 margin: 1%;
	 background-color: rgba(7, 144, 235, 0.5);
	 font-weight: bold;
	 padding: 5px;
	 text-align: center;
 }
 .button {
	 text-decoration: none;
	 color: black;
	 padding: 10px;
 }
 .inline {
	 display: inline-block;
 }
 button:hover, .button:hover {
	 background: rgba(7, 12, 255, 0.1);
 }
 .center {
	 width: 500px;
	 margin: auto;
 }
 .error {
	 color: red;
 }
 .success  {
	 position: relative;
	 background: rgba(0, 128, 0, 0.2);
	 color: green;
	 font-weight: bold;
 }
 .logo {
	 margin-bottom : 10%;
		text-align: center;
 }
 .nav {
	 position: fixed;
	 height: 95%;
	 background : #333;
	 color: white;
	 width: 20%;
	 padding-top: 5%;
	 clear: both;
 }
 .nav .menu ul li{
	 list-style-type: none;
	 height: 50px;
	 background: rgba(51, 51, 51, .1);
	 text-align: center;
	 line-height: 50px;

 }
 .menu ul li:hover {
	background: rgba(81,81,81,0.6);
 }
 .menu ul li a{ 
	 text-decoration: none;
	 font-size: 24px;
	 color: white;
 }
 #footer { text-align: center;}
 #content {
	 position: relative;
	 margin-left: 25%;
	 clear: both;
 }
 .appointments {
	 display : grid;
	 grid-template-columns: 1fr 1fr 1fr;
 }
 .card {
	 display: inline-block;
	 margin: 2%;
	 border: 1px solid #333;
 }
	</style>
</head>
<body> 
	<!-- Wrapper -->
	<div class="wrapper"> 

		<!-- Main content container starts here -->
		<div class="container"> 
			<!-- Navigation starts Here -->
			<div class="navigation-container">
				<nav class="nav" id="nav">
					<div class="navigation">
						<div class="logo" id="logo">OMTS</div>
						<div class="menu">
							<ul>
								<li><a href="index.php">Dashboard</a></li>
								<li><a href="appointment.php">Appointments</a></li>
                <!-- <li><a href="../logout.php">Logout</a></li> -->
							</ul>
						</div>
					</div>
				</nav>
			</div>
			<!-- Navigation ends Here -->
			<!-- Content -->
			<div id="content">