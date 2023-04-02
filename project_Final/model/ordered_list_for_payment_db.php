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
            $stmt =$con->prepare ("SELECT * FROM ordermanage WHERE status=? && username=?");
            $stmt->bind_param("ss",$status,$user);
            $stmt->execute();
            $result= $stmt->get_result();
            ?><table border=1 align="center">
            <tr style='color:0F0D35'>
                <th>Product Name</th>
                <th>Product Image</th>
                <th>Product price</th>
                <th>Status</th>
            </tr>
            <?php
            if($result->num_rows > 0){
                while ($row = $result->fetch_assoc()) {
                    echo "<tr>";
                    echo "<td class='mid'><b>" . $row['product_name'] . "</b></td>";
                    echo "<td class='mid'><img src='../uploads/" . $row['photo_id'] . "' width='100' height='100'></td>";
                    echo "<td class='mid'><b>" . $row['price'] . "</b></td>";
                    echo "<td class='mid' style='color:green'>" . $row['status'] . "</td>";
                    echo "</tr>";  
                }
            }
            ?>
        </table>
        <?php        
            $stmt->close();
        ?>