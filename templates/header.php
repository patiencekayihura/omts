<?php
require_once "config/db-connection.php";
session_start();
if (!isset($_SESSION['user_id'])) {
	// if ($_SERVER['PHP_SELF'])
	$currentPage = basename($_SERVER['PHP_SELF']);
	if ($currentPage !== 'login.php' && $currentPage !== 'index.php'){
		header("Location:login.php");
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
 .menu ul{
 	display: flex;
 	justify-content: flex-end;
 }
 .logo {
 	justify-content: flex-start;
 }
 .menu ul li {
 	list-style-type: none;
 	text-align: center;
 	padding: 10px;
 }
 .menu ul li:hover {
 	background-color: rgba(25,255,23,0.3);
 }
 .menu ul li a {
 	text-decoration: none;
 	font-weight: bold;
 	font-family: sans-serif;
 	color: #333;
 }
 .navigation{
 	display: flex;
 	height: 50px;
	 align-items: center;
	 justify-content: space-between;
	 width: 90%;
	 margin-left: 1%;
	 border-bottom: 2px solid gray;
	 margin-bottom: 2%;
 }
 .text-center {
	 text-align: center;
 }
 .col-2 {
	 display: flex;
	 justify-content: space-around;
 }
 .appointments {
	 display: grid;
	 text-align: center;
	 grid-column-gap: 10px;
	 grid-row-gap: 10px;
 }
 .card {
	 display: inline-block;
	 width: 30%;
	 border: 1px solid gray;
	 grid-area: "card";
	 margin: 1px;
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
	 text-align: center;
	 padding: 0 5px;
 }
 .button {
	 text-decoration: none;
	 color: black;
	 padding: 5px;
 }
 .inline { display: inline-block;}
 button:hover, .button:hover {
	 background: rgba(7, 12, 255, 0.1);
 }
 .center {
	 width: 500px;
	 margin: auto;
 }
 .head-img {
	 position: relative;
	 margin: 0 auto;
	 width: 90%;
 }
 .full-img {
	 position: relative;
	 background-image: url('wooman.jpeg');
	 background-size: 100%;
	 background-repeat: no-repeat;
	 width: 100%;
	 height: 100%;
	 background-position: center;
	 text-align: center;
	 padding: 1%;
 }
 .full-img .big-txt {
	 position: relative;
	font-size: 3em;
	background-color: rgba(0, 128, 0, 0.5);
	color: white;
	width : 80%;
	margin: 0 auto;

 }
 .home-header {
	 text-align: center;
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
								<li><a href="index.php">Home</a></li>
								<li><a href="#">About-us</a></li>
								<li><a href="appointment.php">Appointments</a></li>
								<?php if (!isset($_SESSION['user_id'])){?>
								<li><a href="login.php">Login</a></li>
								<?php } else {
									?>
									<li><a href="logout.php">Logout</a></li>
									<?php
								}?>
								<li><a href="#">Contact-us</a></li>
							</ul>
						</div>
					</div>
				</nav>
			</div>
			<!-- Navigation ends Here -->
			<!-- Content -->
			<div id="content">