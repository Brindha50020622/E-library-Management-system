<?php
session_start();
include "database1.php";
function countRecord($sql,$db)
{
	$res=$db->query($sql);
	return $res->num_rows;
}
if(!isset($_SESSION["ADMINID"]))
{
	header("location:adminlogin.php");	
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
			<img src="img/book1.jpg" class="back-img">
			<div class="text-overlay">
				<h1>E-Library Management System</h1>	
			</div>
			<div class="common1">
				<h3>Welcome Admin</h3>		
		</div>
		<div class="common2">
			<ul>
					<li>Total Students : <?php echo countRecord("select * from student",$db) ?>;</li>
					<li>Total Books : <?php echo countRecord("select * from books",$db) ?>;</li>
					<li>Total Request :<?php echo countRecord("select * from request",$db) ?>;</li>
					<li>Total Comments :<?php echo countRecord("select * from comment",$db) ?>;</li>
				</ul>
		</div>
			<div id="navi2">
				<?php
					include "adminsidebar1.php"
				?>
			</div>
		</div>	
	</body>
</html>