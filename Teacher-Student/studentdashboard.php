<?php
session_start();
if(!isset($_SESSION['login']) || $_SESSION['login'] == false)
{
    header('location:login.php');
    exit;
}

?>
<table align="center"><tr><th>
    <fieldset>
        <legend>Student Dashboard</legend>
        <form action="student_application_validation.php" method="post" novalidate enctype="multipart/form-data">
        <table>
            <tr><th>
                <?php
                if(isset($_SESSION['sick_leave_type_err'])){
                    echo $_SESSION['sick_leave_type_err'];
                    unset($_SESSION['sick_leave_type_err']);
                }
                ?><br>
                <label for="sick_leave_type">Type of sick leave:</label>
                <select name="sick_leave_type" id="sick_leave_type">
                    <option value="">None</option>
                    <option value="">Death leave</option>
                    <option value="">Medical sickness</option>
                </select>
            </th></tr>
            <tr>
                <th>
                <?php
                if(isset($_SESSION['upload_document_err'])){
                    echo $_SESSION['upload_document_err'];
                    unset($_SESSION['upload_document_err']);
                }
                ?><br>
                    <label for="upload_document">Upload Document:</label>
                    <input type="file" name="upload_document" id="upload_document" multipule>
                </th>
            </tr>
            <tr>
                <th align="right">
                    <input type="submit" value="Submit">
                </th>
            </tr>
        </table>
        </form>
    </fieldset></th></tr>
</table>