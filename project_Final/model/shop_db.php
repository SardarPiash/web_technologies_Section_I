<style>
    .tablt {
  width: 800px;
  height: 250px;
  border-collapse: collapse;
  border: 2.5px solid green;
  text-align:center;
  
}
</style>
<table border=1 align="center" class="tablt">
    <tr style='color:0F0D35'>
        <th>Product ID</th>
        <th>Product Image</th>
        <th>Product Name</th>
        <th>Price</th>
        <th>Details</th>
        <th>Delete</th>
    </tr>
    <?php
    $servername = "localhost";
    $uname = "root";
    $pass = "";
    $dbname = "project";
    $con = mysqli_connect($servername, $uname, $pass, $dbname);

    $stmt = $con->prepare("SELECT * FROM newproduct WHERE username=?");
    $username = $_SESSION['username'];
    $stmt->bind_param("s", $username);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {

            echo "<tr>";
            echo "<td class='mid'><b>" . $row['id'] . "</b></td>";
            echo "<td class='mid'><img src='../uploads/" . $row['photo_id'] . "' width='100' height='100'></td>";
            echo "<td class='mid'><b>" . $row['name'] . "</b></td>";
            echo "<td class='mid'><b>" . $row['price'] . "</b></td>";
            echo "<td class='mid'>" . $row['details'] . "</td>";
            echo "<td class='mid'>";
            ?>
            <form method="post" action="../controller/delete_product_validation.php"  novalidate> 
                <input type="hidden" name="id" value="<?php echo $row['id']; ?>">
                <!-- <input type='submit' value='Delete' class="button"> -->
                <button onclick="deleteProduct(<?php echo $row['id']; ?>)" class="button">Delete</button>
            </form>
            <?php
            echo "</td>";
            echo "</tr>";
        }
    }
    ?>
</table>
<script src="shop.js"></script>
