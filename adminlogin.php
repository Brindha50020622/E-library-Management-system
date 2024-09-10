<?php
	session_start();
	include "database1.php";

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
			<div class="common">
				<h3>Admin Login Here</h3>
			</div>
			<div class="c1">
				<?php
					if(isset($_POST["submit"]))
					{
						$sql="SELECT * FROM admins WHERE ADMINNAME='{$_POST["aname"]}' AND ADMINPASS='{$_POST["apass"]}'";
						$res=$db->query($sql);
						if($res->num_rows>0)
						{
							$row=$res->fetch_assoc();
							$_SESSION["ADMINID"]=$row["ADMINID"];
							$_SESSION["ADMINNAME"]=$row["ADMINNAME"];
							header("location:ahome1.php");
							
						}
						else
						{
							echo "<p class='error'>Invalid User Details</p>";
						}
					}	
				?>
			</div>
				<form action="adminlogin.php" method="post">
					<div class="form-group">
					<label>Name</label>
					<input type="text" name="aname" required>
					</div>
					<div class="form-group">
					<label>Password</label>
					<input type="password" name="apass" required>
					</div>
					<button type="submit" name="submit">Login Now</button>
				</form>
			
			<div id="navi1">
				<?php
					include "sidebar1.php"
				?>
			</div>
		</div>	
	</body>
</html>