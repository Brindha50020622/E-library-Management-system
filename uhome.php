<?php
session_start();
include "database1.php";

if(!isset($_SESSION["ID"]))
{
	header("location:userlogin.php");	
}
?>



<!DOCTYPE HTML>
<html>
	<head>
		<title>E-Library Management System</title>
		<link rel="stylesheet" type="text/css" href="css1/style1.css"
	</head>
	<body>
		<div class="container">
			<img src="img/book5.jpg" class="back-img">
			<div class="text-overlay1">
				<h1>E-Library Management System</h1>	
			</div>
			<div class="common10">
				<h3>Welcome <?php echo $_SESSION["NAME"];?></h3>		
		</div>
		
			<div id="navi4">
				<?php
					include "usersidebar1.php"
				?>
			</div>
		</div>	
	</body>
</html>