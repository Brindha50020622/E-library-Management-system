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
				<h3>Search Book</h3>		
			</div>
			
			
			<div class="common4">
				<div class="c7">
					
				<?php
					if(isset($_POST["submit"]))
					{
						$sql="SELECT * FROM books where BOOKTITLE like '%{$_POST["name"]}%' or BKEYWORDS like '%{$_POST["name"]}%'";
					$res=$db->query($sql);
					if($res->num_rows>0)
					{
						echo "<table class='custom-table'>
								<tr>
									<th>SNO</th>
									<th>BOOK NAME</th>
									<th>KEYWORDS</th>
									<th>VIEW</th>
									<th>COMMENT</th>
								</tr>
								";
								$i=0;
							while($row=$res->fetch_assoc())
							{
								$i++;
								echo "<tr>";
								echo "<td>{$i}</td>";
								echo "<td>{$row["BOOKTITLE"]}</td>";
								echo "<td>{$row["BKEYWORDS"]}</td>";
								echo "<td><a href='{$row["BFILE"]}' target='_blank'>View</a></td>";
								echo "<td><a href='comment.php?id={$row["BOOKID"]}'>Go</a></td>";
								
								echo "</tr>";
							}
							echo "</table>";
					}
					else
					{
						echo "<p class='error'>No Books found</p>";
					}
						
						
					}
				?>
					</div>
				<form action="<?php echo $_SERVER["PHP_SELF"];?>" method="post">
					<label>Enter Book name or Keywords</label>
						<textarea name="name" required></textarea>
						<button type="submit" name="submit">Search Book</button>
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
