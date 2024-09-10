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
			<div class="common7">
				<h3>Delete Book</h3>		
			</div>
			
			
			<div class="common5">
				<?php
					if(isset($_POST["submit"]))
					{
						$bookname=isset($_POST['bookname']) ? $_POST['bookname']:'';
						if(!empty($bookname))
						{
							$sql_check="SELECT * FROM books WHERE BOOKTITLE='$bookname'";
							$res_check=$db->query($sql_check);
							if($res_check->num_rows>0)
							{
								
							$sql="DELETE FROM books WHERE BOOKTITLE='$bookname'";
							if($db->query($sql)=== TRUE)
							{
								echo "<p class='success1'>Book Deleted successfully</p>";
							}
							else
							{
								echo "<p class='error1'>Error in deleting book .$db->error.</p>";
							}
							}
							else
							{
								echo "<p class='error1'>Enter correct Book name</p>";
							}
						}
							
						
					}
				?>
				<form action="<?php echo $_SERVER["PHP_SELF"];?>" method="post">
						<label>Book Title</label>
						<input type="text" name="bookname" required>
						<button type="submit" name="submit">Delete Book</button>
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