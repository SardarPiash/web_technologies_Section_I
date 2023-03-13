<?php
//  session_start();
            $username=$_SESSION['username'];
            $servername = "localhost";
            $uname = "root";
            $pass = "";
            $dbname = "project";
            $con = mysqli_connect($servername, $uname, $pass, $dbname);
            $sql = "SELECT name,username,email,phone,gender,bloodgroup,dob,type,address FROM registration WHERE username='$username'";

            $result = mysqli_query($con, $sql);

            if (mysqli_num_rows($result) > 0) {
                while($row = mysqli_fetch_assoc($result)) {
                $_SESSION['name']=$row["name"];
                $_SESSION['username']=$row["username"];
                $_SESSION['email']=$row["email"];
                $_SESSION['phone']=$row["phone"];
                $_SESSION['gender']=$row["gender"];
                $_SESSION['bloodgroup']=$row["bloodgroup"];
                $_SESSION['dob']=$row["dob"];
                $_SESSION['status']=$row["type"];
                $_SESSION['address']=$row["address"];
                }
            }
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