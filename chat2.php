<?php
            
            $buyer_username=$_SESSION['buyer_username'];
            $servername = "localhost";
            $uname = "root";
            $pass = "";
            $dbname = "project";
            $con = mysqli_connect($servername, $uname, $pass, $dbname);
            $sql2 = "SELECT * FROM chat WHERE username='$buyer_username'";
            $result2 = mysqli_query($con, $sql2);

            echo "<table>";
            while ($row2 = mysqli_fetch_assoc($result2)) {
                    echo "<tr>";
                    echo "<td>" . $_SESSION['buyer_username'] . " : " . $row2['text'] . "</td>";
                    echo "</tr>";
                }
                echo "</table>";
            
?>