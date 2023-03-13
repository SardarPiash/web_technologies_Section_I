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
            $sql = "SELECT * FROM ordermanage WHERE username='$user'";
            $result = mysqli_query($con, $sql);
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
                while ($row = mysqli_fetch_assoc($result)) {
                    echo "<tr>";
                    echo "<td class='mid'><b>" . $row['product_name'] . "</b></td>";
                    echo "<td class='mid'><img src='uploads/" . $row['photo_id'] . "' width='100' height='100'></td>";
                    echo "<td class='mid'><b>" . $row['price'] . "</b></td>";
                    if($row['status']=="Approved"){
                        echo "<td class='mid' style='color:green'>" . $row['status'] . "</td>";
                    }else{
                        echo "<td class='mid' style='color:red'>" . $row['status'] . "</td>";
                    }
                    echo "<td class='mid'>"; ?>
                    <form method="post" action="approve.php" novalidate> 
                    <input type="hidden" name="id" value="<?php echo $row['id']; ?>">
                    <input type='submit' value='Approve'style='color:green'>
                    </form>
                    <?php
                        echo "</td class='mid'>";
                        echo "<td class='mid'>";?>
                    <form method="post" action="reject.php" novalidate> 
                    <input type="hidden" name="id" value="<?php echo $row['id']; ?>">
                    <input type='submit' value='Reject' style='color:red'>
                    </form>
                    <?php
                        echo "</td>";
                        echo "</tr>";  
                }
            ?>
        </table>
        <?php        
            mysqli_close($con);
        ?>