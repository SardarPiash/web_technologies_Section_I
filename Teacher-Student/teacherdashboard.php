<?php
session_start();
?>
<table align="Center" border=1>
    <tr>
        <th align="center" colspan="4">Sutdent Application</th>
    </tr>
    <tr>
        <th>Student Name</th>
        <th>Reason for sick leave</th>
        <th>Documents</th>
        <th>Approval</th>
    </tr>
    <?php
        $user=$_SESSION['username'];
        $servername = "localhost";
        $uname = "root";
        $pass = "";
        $dbname = "Schoolsystem";
        $con = mysqli_connect($servername, $uname, $pass, $dbname);

        // pulling data from newproduct database..........
        $sql ="SELECT * FROM application ORDER BY id DESC LIMIT 10";

        $result = mysqli_query($con, $sql);
        while ($row = mysqli_fetch_assoc($result)) {
            ?>
            <tr>
            <td><?php echo $row['username'];?> </td>
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
            if($row['approval']=="Approved" || $row['approval']=="Rejected")
        {
            ?>
            <td><?php echo $row['approval']; ?></td>
            <?php
        }else{
    
    ?>
            
             <td><form action="accept.php" method="post" novalidate>
             <input type="hidden" name="id" value="<?php echo $row['id']; ?>">
             <input type="submit" value="Accept" >
             </form>
             <form action="reject.php" method="post" novalidate>
             <input type="hidden" name="id" value="<?php echo $row['id']; ?>">
             <input type="submit" value="Reject" >
             </form>
            </td>   </tr>
            <?php  }  }?>
</table>
<fieldset align="center">
<form action="logout.php" method="post" novalidate>
    <input type="submit" value="Log out">
</form>
</fieldset>