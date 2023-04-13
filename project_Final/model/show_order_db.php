<style>
    .mid{
        text-align:center;
    }
    table {
  width: 800px;
  height: 550px;
}
</style>
<?php
            $user=$_SESSION['username'];
            $servername = "localhost";
            $uname = "root";
            $pass = "";
            $dbname = "project";
            $con = mysqli_connect($servername, $uname, $pass, $dbname);

            // pulling data from ordermanage database..........
            $stmt =$con->prepare("SELECT * FROM ordermanage WHERE username=?");
            $stmt->bind_param("s",$user);
            $stmt->execute();
            $result = $stmt->get_result();
            ?><table border=1 align="center" class="tablt">
            <tr style='color:0F0D35'>
                <th>Product Name</th>
                <th>Product Image</th>
                <th>Product price</th>
                <th>Status</th>
                <th>Approve</th>
                <th>Reject</th>
            </tr>
            <?php
            if($result->num_rows>0){
                while ($row = $result->fetch_assoc()) {
                    if(is_null($row['order_decision'])){
                    echo "<tr>";
                    echo "<td class='mid'><b>" . $row['product_name'] . "</b></td>";
                    echo "<td class='mid'><img src='../uploads/" . $row['photo_id'] . "' width='100' height='100'></td>";
                    echo "<td class='mid'><b>" . $row['price'] . "</b></td>";
                    if($row['status']=="Approved"){
                        echo "<td class='mid' style='color:green'>" . $row['status'] . "</td>";
                    }else{
                        echo "<td class='mid' style='color:red'>" . $row['status'] . "</td>";
                    }
                    echo "<td class='mid'>"; ?>
                    <form method="post" action="../controller/approve.php" novalidate> 
                    <input type="hidden" name="id" value="<?php echo $row['id']; ?>">
                    <input type='submit' value='Approve'class='button'>
                    </form>
                    <?php
                        echo "</td class='mid'>";
                        echo "<td class='mid'>";?>
                    <form method="post" action="../controller/reject.php" novalidate> 
                    <input type="hidden" name="id" value="<?php echo $row['id']; ?>">
                    <input type='submit' value='Reject' class='button'>
                    </form>
                    <?php
                        echo "</td>";
                        echo "</tr>";  
                }}
            }
            ?>
        </table>
        <?php        
            $stmt->close();
        ?>