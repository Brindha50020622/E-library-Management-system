<?php
session_start();
include "database1.php";
if(!isset($_SESSION["ADMINID"])) {
    header("location:adminlogin.php");    
}

if(isset($_GET['delete_comment'])) {
    $comment_id = $_GET['delete_comment'];
    $delete_sql = "DELETE FROM comment WHERE CID = $comment_id"; // Use 'CID' instead of 'ID'
    $db->query($delete_sql);
    header("location:viewcomment1.php");
}
?>

<!DOCTYPE HTML>
<html>
<head>
    <title>E-Library Management System</title>
    <link rel="stylesheet" type="text/css" href="css1/style1.css">
</head>
<body>
    <div class="container">
        <img src="img/book1.jpg" class="back-img">
        <div class="text-overlay">
            <h1>E-Library Management System</h1>    
        </div>
        <div class="common1">
            <h3>View Comment Details</h3>        
        </div>
        <div class="common3">
            <?php
            $sql = "SELECT student.ID, books.BOOKTITLE, student.NAME, comment.COMM, comment.LOGS, comment.CID as comment_id FROM comment INNER JOIN books ON books.BOOKID = comment.BOOKID INNER JOIN student ON comment.SID = student.ID";
            $res = $db->query($sql);
            if($res->num_rows > 0) {
                echo "<table>
                    <tr>
                        <th>SID</th>
                        <th>BOOK NAME</th>
                        <th>STUDENT NAME</th>
                        <th>COMMENTS</th>
                        <th>LOGS</th>
                        <th>Action</th>
                    </tr>";
                while($row = $res->fetch_assoc()) {
                    echo "<tr>";
                    echo "<td>{$row["ID"]}</td>";
                    echo "<td>{$row["BOOKTITLE"]}</td>";
                    echo "<td>{$row["NAME"]}</td>";
                    echo "<td>{$row["COMM"]}</td>";
                    echo "<td>{$row["LOGS"]}</td>";
                    echo "<td><a href='viewcomment1.php?delete_comment={$row['comment_id']}' onclick='return confirm(\"Are you sure you want to delete this comment?\")'>Delete</a></td>";
                    echo "</tr>";
                }
                echo "</table>";
            } else {
                echo "<p class='error'>No Comments Found</p>";
            }
            ?>
        </div>
        <div id="navi2">
            <?php
            include "adminsidebar1.php";
            ?>
        </div>
    </div>    
</body>
</html>
