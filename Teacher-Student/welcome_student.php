<?php
session_start();
?>
<table align="center" border=1>
    <tr>
        <th colspan="3" >Refresh Your page to see your application Status</th>
    </tr>
    <tr>
        <th>Apllication type</th>
        <th>Documents</th>
        <th>Status</th>
    </tr>
    
        <?php
        $user=$_SESSION['username'];
        $servername = "localhost";
        $uname = "root";
        $pass = "";
        $dbname = "Schoolsystem";
        $con = mysqli_connect($servername, $uname, $pass, $dbname);

        // pulling data from newproduct database..........
        $sql = "SELECT * FROM application WHERE username='$user'";
        $result = mysqli_query($con, $sql);
    while ($row = mysqli_fetch_assoc($result)) {
        ?>
        <tr>
        <td><?php echo $row['application_type'];?> </td>
        <?php 
        if($row['application_type']=="Death leave"){
            ?>
            <td><?php echo $row['doc_id'];  ?></td>
            <?php
        }else
        {
            ?>
            <td><embed src="uploads/<?php echo $row['doc_id'];  ?>" type="application/pdf"></td>
            <?php
        }
        ?>
         <td><?php echo $row['approval'];?></td>   </tr>
        <?php    }?>         
</table>
<fieldset align="center">
<form action="logout.php" method="post" novalidate>
    <input type="submit" value="Log out">
</form>
</fieldset>