<?php
require_once "config/db-connection.php";
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
 	background-color: gray;
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
 }
 .button {
	 text-decoration: none;
	 color: black;
	 padding: 10px;
 }
 button:hover, .button:hover {
	 background: rgba(74, 182, 255, 0.8);
 }
 .center {
	 width: 500px;
	 margin: auto;
 }
 .head-img {
	 position: relative;
	 margin: 0 auto;
	 width: 90%;
	 height: 500px;
 }
 .full-img {
	 position: absolute;
	 background-image: url('wooman.jpeg');
	 background-size: 100%;
	 background-repeat: no-repeat;
	 width: 100%;
	 height: 80%;
	 background-position: center;
	 text-align: center;
	 padding-top: 1%;
 }
 .full-img .big-txt {
	font-size: 3em;
	background-color: rgba(0, 128, 0, 0.5);
	color: white;
	width : 80%;
	margin: 0 auto;

 }
 .home-header {
	 text-align: center;
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
								<li><a href="login.php">Login</a></li>
								<li><a href="#">Contact-us</a></li>
							</ul>
						</div>
					</div>
				</nav>
			</div>
			<!-- Navigation ends Here -->
			<!-- Content -->
			<div id="content">