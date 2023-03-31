<?php
include 'view_seller_info_db.php';
?>
<h3 align="center"><u>User Profile</u></h3>
<table align='center' class="tablt">
                    <tr>
                        <td>
                        <?php echo "<b>Name: </b>".$_SESSION['name']; ?>
                        </td>
                    </tr>
                    <tr >
                        <td>
                            <?php echo "<b>Username: </b>".$_SESSION['username']; ?>
                        </td>
                    </tr>
                    <tr >
                        <td><?php echo "<b>Email: </b>".$_SESSION['email']; ?></td>
                    </tr>
                    <tr >
                        <td><?php echo "<b>Phone Number: </b>".$_SESSION['phone']; ?></td>
                    </tr>
                    <tr >
                        <td><?php echo "<b> Gender: </b>".$_SESSION['gender']; ?></td>
                    </tr>
                    <tr >
                        <td><?php echo "<b> Blood Group: </b>".$_SESSION['bloodgroup']; ?></td>
                    </tr>
                    <tr >
                        <td><?php echo "<b> Date of Birth: </b>".$_SESSION['dob']; ?></td>
                    </tr>
                    <tr >
                        <td><?php echo "<b> Status: </b>".$_SESSION['status']; ?></td>
                    </tr>
                    <tr >
                        <td><?php echo "<b> Address: </b> ".$_SESSION['address']; ?></td>
                    </tr>
                </table>