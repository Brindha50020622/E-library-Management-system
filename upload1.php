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
				<h3>Upload Books</h3>		
			</div>
			
			<div class="common5">
		
				<div class="c2">
				<?php
					if(isset($_POST["submit"]))
					{
						$target_dir="uploads/";
						$target_file=$target_dir.basename($_FILES["efile"]["name"]);
						if(move_uploaded_file($_FILES["efile"]["tmp_name"],$target_file))
						{
							$sql="insert into books(BOOKTITLE,BKEYWORDS,BFILE) values ('{$_POST["bname"]}','{$_POST["keys"]}','{$target_file}')";
							$db->query($sql);
							echo "<p class='success'>Book Uploaded successfully</p>";
						}
						
						else
						{
							echo "<p class='error'>Error in Uploading</p>";
						}
					}
				?>
				</div>
				<form action="<?php echo $_SERVER["PHP_SELF"];?>" method="post" enctype="multipart/form-data">
					<label>Book Title</label>
					<input type="text" name="bname" required>
					<label>Keywords</label>
					<textarea name="keys" required></textarea>
					<label>Upload File</label>
					<input type="file" name="efile" required>
					<button type="submit" name="submit">Upload Book</button>
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
