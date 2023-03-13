<style>
    .mid{
        text-align:center;
    }
    table {
  width: 800px;
  height: 250px;
  border-collapse: collapse;
  border: 2px solid green;
}
</style>
<?php
            $user=$_SESSION['username'];
            $status="Approved";
            $servername = "localhost";
            $uname = "root";
            $pass = "";
            $dbname = "project";
            $con = mysqli_connect($servername, $uname, $pass, $dbname);
            
            // pulling data from ordermanage database..........
            $sql = "SELECT * FROM ordermanage WHERE status='$status' && username='{$_SESSION['username']}'";
            $result = mysqli_query($con, $sql);
            ?><table border=1 align="center">
            <tr style='color:0F0D35'>
                <th>Product Name</th>
                <th>Product Image</th>
                <th>Product price</th>
                <th>Status</th>
            </tr>
            <?php
                while ($row = mysqli_fetch_assoc($result)) {
                    echo "<tr>";
                    echo "<td class='mid'><b>" . $row['product_name'] . "</b></td>";
                    echo "<td class='mid'><img src='uploads/" . $row['photo_id'] . "' width='100' height='100'></td>";
                    echo "<td class='mid'><b>" . $row['price'] . "</b></td>";
                    echo "<td class='mid' style='color:green'>" . $row['status'] . "</td>";
                    echo "</tr>";  
                }
            ?>
        </table>
        <?php        
            mysqli_close($con);
        ?>