<?php
session_start();
include "database1.php";
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
				<h3>Change Password</h3>		
			</div>
			
			
			<div class="common4">
				<div class="c2">
				<?php
					if(isset($_POST["submit"]))
					{
						$sql="SELECT * FROM admins WHERE ADMINPASS='{$_POST["opass"]}' and ADMINID='{$_SESSION["ADMINID"]}'";
						$res=$db->query($sql);
						if($res->num_rows>0)
						{
							$s="update admins set ADMINPASS='{$_POST["npass"]}' WHERE ADMINID=".$_SESSION["ADMINID"];
							$db->query($s);
							echo "<p class='success'>Password Updated</p>";
						}
						else
						{
							echo "<p class='error'>Invalid Password</p>";
						}
					}
				?>
				</div>
				<form action="<?php echo $_SERVER["PHP_SELF"];?>" method="post">
					<label>Old Password</label>
					<input type="password" name="opass" required>
					<label>New Password</label>
					<input type="password" name="npass" required>
					<button type="submit" name="submit">Update Password</button>
				</form>
				
			</div>
		
		
			<div id="navi2">
				<?php
					include "adminsidebar1.php"
				?>
			</div>
		</div>	
	</body>
</html>
