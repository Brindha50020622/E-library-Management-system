<?php
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
			<div class="common7">
				<h3>New User Registration</h3>		
			</div>
			
			
			<div class="common6">
				<?php
					if(isset($_POST["submit"]))
					{
						$sql="insert into student(NAME,PASS,MAIL,DEP) values('{$_POST["name"]}','{$_POST["pass"]}','{$_POST["mail"]}','{$_POST["dep"]}')";
						$db->query($sql);
						echo "<p class='success'>User Registration Successful</p>";
						
					}
				?>
				<form action="<?php echo $_SERVER["PHP_SELF"];?>" method="post">
						<label>Name</label>
						<input type="text" name="name" required>
						<label>Password</label>
						<input type="password" name="pass" required>
						<label>E-Mail ID</label>
						<input type="email" name="mail" required>
						<select name="dep" required>
							<option value="">Select</option>
							<option value="BSC">BSC</option>
							<option value=" MSC">MSC</option>
							<option value="MBA">MBA</option>
							<option value="MCA">MCA</option>
							<option value="Mech">Mech</option>
							<option value="Btech">Btech</option>
							<option value="CSD">CSD</option>
							<option value="Others">Others</option>
						</select>
						<button type="submit" name="submit">Register</button>
					</form>
				
			</div>
		
		
			<div id="navi3">
				<?php
					include "sidebar1.php"
				?>
			</div>
		</div>	
	</body>
</html>