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
				<h3>Change Password</h3>		
			</div>
			
			
			<div class="common4">
				<div class="c7">
				<?php
					if(isset($_POST["submit"]))
					{
						$sql="SELECT * FROM student WHERE PASS='{$_POST["opass"]}' and ID='{$_SESSION["ID"]}'";
						$res=$db->query($sql);
						if($res->num_rows>0)
						{
							$s="update student set PASS='{$_POST["npass"]}' WHERE ID=".$_SESSION["ID"];
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
		
		
			<div id="navi4">
				<?php
					include "usersidebar1.php"
				?>
			</div>
		</div>	
	</body>
</html>
