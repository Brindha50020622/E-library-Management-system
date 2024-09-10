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
				<h3>View Student Details</h3>		
			</div>
			
			
			<div class="common3">
				<?php
					$sql="SELECT * FROM student";
					$res=$db->query($sql);
					if($res->num_rows>0)
					{
							echo "<table>
								<tr>
									<th>SID</th>
									<th>NAME</th>
									<th>EMAIL</th>
									<th>DEPARTMENT</th>
								</tr>
									";
									$i=0;
								while($row=$res->fetch_assoc())
								{
									$i++;
									echo "<tr>";
									echo "<td>{$row["ID"]}</td>";
									echo "<td>{$row["NAME"]}</td>";
									echo "<td>{$row["MAIL"]}</td>";
									echo "<td>{$row["DEP"]}</td>";
									
									echo "</tr>";
									
								}
								echo "</table>";
					}
					else
					{
						echo "<p class='error'>No Student Record Found</p>";
					}
				?>
				
			</div>
		
		
			<div id="navi2">
				<?php
					include "adminsidebar1.php"
				?>
			</div>
		</div>	
	</body>
</html>