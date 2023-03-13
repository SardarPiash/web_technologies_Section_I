
<?php
            
            $username=$_SESSION['username'];
            $servername = "localhost";
            $uname = "root";
            $pass = "";
            $dbname = "project";
            $con = mysqli_connect($servername, $uname, $pass, $dbname);
            $sql = "SELECT * FROM chat WHERE username='$username'";
            $result = mysqli_query($con, $sql);

            echo "<table>";
                while ($row = mysqli_fetch_assoc($result)) {
                    echo "<tr>";
                    echo "<td>" . $username . " : " . $row['text'] . "</td>";
                    echo "</tr>";
                }
                echo "</table>";    
            
?>