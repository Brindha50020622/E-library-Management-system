<?php
session_start();
include "database1.php";
if(!isset($_SESSION["ID"])) {
	header("location:userlogin.php");	
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
        <img src="img/book5.jpg" class="back-img">
        <div class="text-overlay1">
            <h1>E-Library Management System</h1>    
        </div>
        <div class="common10">
            <h3> Send Your Comments</h3>        
        </div>
        
        <!-- Book Details -->
        <div class="common4">
            <div class="c7">
                <?php
                    $sql = "SELECT * FROM books WHERE BOOKID = " . $_GET["id"];
                    $res = $db->query($sql);
                    if($res->num_rows > 0) {
                        echo "<table class='custom-table1'>";
                        $row = $res->fetch_assoc();
                        echo "
                            <tr>
                                <th>Book Name</th>
                                <td>{$row["BOOKTITLE"]}</td>
                            </tr>
                            <tr>
                                <th>Keywords</th>
                                <td>{$row["BKEYWORDS"]}</td>
                            </tr>
                        ";
                        echo "</table>";
                    } else {
                        echo "<p class='error'>No Books Found</p>";
                    }
                ?>
            </div>
        </div>
        
        <!-- Comment Form -->
        <div class="c11">
            <form action="<?php echo $_SERVER["REQUEST_URI"];?>" method="post">
                <label>Your Comments</label>
                <textarea name="mes" required></textarea>
                <button type="submit" name="submit">Post Now</button>
            </form>
        </div>
        
        <!-- Display Comments -->
        <div class="common17">
            <div class="c7">
                <?php
                    if(isset($_POST["submit"])) {
                        $sql = "INSERT INTO comment (BOOKID, SID, COMM, LOGS) VALUES ({$_GET["id"]}, {$_SESSION["ID"]}, '{$_POST["mes"]}', NOW())";
                        $db->query($sql);
                    }

                    $sql = "SELECT student.NAME, comment.COMM, comment.LOGS 
                            FROM comment 
                            INNER JOIN student ON comment.SID = student.ID 
                            WHERE comment.BOOKID = {$_GET["id"]} 
                            ORDER BY comment.CID ASC"; // Changed order to ascending
                    $res = $db->query($sql);
                    if($res->num_rows > 0) {
                        echo "<table class='comments-table'>";
                        echo "<tr>
                                <th>Student Name</th>
                                <th>Comment</th>
                                <th>Timestamp</th>
                              </tr>";
                        while ($row = $res->fetch_assoc()) {
                            echo "<tr>";
                            echo "<td>{$row["NAME"]}</td>";
                            echo "<td>{$row["COMM"]}</td>";
                            echo "<td>{$row["LOGS"]}</td>";
                            echo "</tr>";
                        }
                        echo "</table>";
                    } else {
                        echo "<p class='nocomments'>No Comments yet...</p>";
                    }
                ?>
            </div>
        </div>
        
        <!-- Sidebar -->
        <div id="navi4">
            <?php
                include "usersidebar1.php";
            ?>
        </div>
    </div>    
</body>
</html>

