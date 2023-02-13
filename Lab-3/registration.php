<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Task-2</title>
</head>
<body>
    <table align=center>
        <tr><td>
    <h2>Registration Page</h2>
    
    <form action="regcheck.php" method="post" novalidate>
        <fieldset>
                    <legend>General Information</legend>
                    <table align=center>
                        <tr>
                            <th><label for="firstname">First Name :</label></th>
                               <td><input type="text" id="firstname" name="firstname"></td>
                        </tr>
                        <tr>
                            <th><label for="lastname">Last Name :</label></th>
                               <td><input type="text" id="lastname" name="lastname"></td>
                        </tr>
                        <tr>
                            <th><label for="fathername">Father's Name :</label></th>
                               <td><input type="text" id="fathername" name="fathername"></td>
                        </tr>
                        <tr>
                            <th><label for="mothername">Mother's Name :</label></th>
                               <td><input type="text" id="mothername" name="mothername"></td>
                        </tr>
                        <tr>
                            <th><label for="gender">Gender :</label></th>
                               <td><input type="radio" id="gender" name="gender" value="Male">Male
                                <input type="radio" id="gender" name="gender" value="Female">Female</td>
                        </tr>
                        <tr>
                            <th><label for="dob">Date of Birth :</label></th>
                               <td><input type="date" id="dob" name="dob" value=""></td>
                        </tr>
                        <tr>
                            <th><label for="blood">Blood Group :</label></th>
                               <td>
                                <select name="blood" id="blood">
                                    <option>A+</option>
                                    <option>B+</option>
                                    <option>A-</option>
                                    <option>B-</option>
                                    <option>O+</option>
                                </select>
                               </td>
                        </tr></table>
                    </fieldset></td></tr><tr><td>
                <fieldset>
                    
                    <legend>Contact Information</legend>
                    <table>
                    <tr>
                        <th><label for="email">Email :</label></th>
                           <td><input type="email" id="email" name="email"></td>
                    </tr>
                    <tr>
                        <th><label for="phone">Phone Number :</label></th>
                           <td><input type="number" id="phone" name="phone"></td>
                    </tr>
                    <tr>
                        <th><label for="website">Website :</label></th>
                           <td><input type="ur" id="website" name="website"></td>
                    </tr>
                    <tr>
                        <th><label for="address">Present Address :</label></th>
                           <td><textarea name="address" id="address" cols="20" rows="2"></textarea></td>
                    </tr>
                </fieldset>
              </table></td></tr><tr><td>
              <fieldset>
                    
                    <legend>Account Information</legend>
                    <table>
                    <tr>
                        <th><label for="username">Username :</label></th>
                           <td><input type="text" id="username" name="username"></td>
                    </tr>
                    <tr>
                        <th><label for="password">Password :</label></th>
                           <td><input type="password" id="password" name="password"></td>
                    </tr></table></fieldset></td></tr><tr><td>
                        <table align=center><tr><td>
                        <input type="submit" value="Registration" ></td></tr></table></td></tr>
                        
</form></td></tr></table>

     <p align=center>Already have an account? Login <a href="login.php">here</a></p>
</body>
</html>