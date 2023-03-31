<style>
    .mide{
        text-align:center;
    }
    .tablt {
  width: 400px;
  height: 100px;
  border-collapse: collapse;
  border: 2.5px solid green;
  
}
</style>
            <?php
            $user=$_SESSION['username'];
            $servername = "localhost";
            $uname = "root";
            $pass = "";
            $dbname = "project";
            $con = mysqli_connect($servername, $uname, $pass, $dbname);

            // pulling data from blog database..........
            $sql = "SELECT * FROM blog ";
            $result = mysqli_query($con, $sql);
            ?><table border=1 align="center" class="tablt">
            
            <?php
                while ($row = mysqli_fetch_assoc($result)) {
                    // echo "<tr>";
                    echo "<tr><th class='mide'><img src='uploads/" . $row['photo_id'] . "' width='100' height='100'></th></tr>";
                    echo "<tr><th class='mide'><b> Title: " . $row['title'] . "</b></th></tr>";
                    echo "<tr><th class='mide'><b> Blog: " . $row['blog'] . "</b></th></tr>";
                    echo "</tr>";
                    
                }
            ?>
        </table>
        <?php        
            mysqli_close($con);
        ?>