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
				<h3>New Book Request</h3>		
			</div>
			
			
			<div class="common4">
				<div class="c7">
				<?php
					if(isset($_POST["submit"]))
					{
						$sql="insert into request (ID,MES,LOGS) values ({$_SESSION["ID"]},'{$_POST["mess"]}',now())";
						
						$db->query($sql);
						echo "<p class='success'>Request Sent</p>";
						
						
					}
				?>
				</div>
				<form action="<?php echo $_SERVER["PHP_SELF"];?>" method="post">
					
					<label>Message</label>
					<textarea required name="mess"></textarea>
					<button type="submit" name="submit">Send</button>
				</form>
				
			</div>
		
		
			<div id="navi4">
				<?php
					include "usersidebar1.php"
				?>
			</div>
		</div>	
	</body>
</html>
