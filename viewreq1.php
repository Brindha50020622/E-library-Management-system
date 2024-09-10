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
				<h3>View Request Details</h3>		
			</div>
			
			
			<div class="common3">
				<?php
					$sql="SELECT STUDENT.ID,student.NAME,request.MES,request.LOGS FROM STUDENT inner join request on student.ID=request.ID";
					$res=$db->query($sql);
					if($res->num_rows>0)
					{
							echo "<table>
								<tr>
									<th>SID</th>
									<th>STUDENT NAME</th>
									<th>MESSAGE</th>
									<th>LOGS</th>
								</tr>
									";
									$i=0;
								while($row=$res->fetch_assoc())
								{
									$i++;
									echo "<tr>";
									echo "<td>{$row["ID"]}</td>";
									echo "<td>{$row["NAME"]}</td>";
									echo "<td>{$row["MES"]}</td>";
									echo "<td>{$row["LOGS"]}</td>";
									
									echo "</tr>";
									
								}
								echo "</table>";
					}
					else
					{
						echo "<p class='error'>No Request Found</p>";
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