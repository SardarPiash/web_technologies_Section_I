<?php
session_start();

if ($_SERVER['REQUEST_METHOD'] === "POST") {
    $flag = true;
    $approval = "Rejected";
    $sick_leave_type = sanitize($_POST['sick_leave_type']);
    $upload_document = isset($_FILES['upload_document']) ? $_FILES['upload_document'] : null;

    if (empty($sick_leave_type)) {
        $_SESSION['sick_leave_type'] = '<b style="color:red">*Enter Leave type first...</b>';
        $flag = false;
    } else {
        $_SESSION['sick_leave_type_err'] = "";
        $_SESSION['sick_leave_type'] = $sick_leave_type;
    }

    if ($sick_leave_type == "None") {
        $_SESSION['sick_leave_type_err'] = "*Leave type could not be None.<b>";
        $flag = false;
    } else {
        $_SESSION['sick_leave_type_err'] = "";
        $_SESSION['sick_leave_type'] = $sick_leave_type;
    }

    if ($sick_leave_type === "Medical sickness") {
        if (!empty($upload_document)) {
            $doc_name = $upload_document['name'];
            $doc_size = $upload_document['size'];
            $tmp_name = $upload_document['tmp_name'];
            $error = $upload_document['error'];

            $doc_ex = pathinfo($doc_name, PATHINFO_EXTENSION);
            $doc_ex_lc = strtolower($doc_ex);

            $new_doc_name = uniqid("PDF-", true) . '.' . $doc_ex_lc;
            $doc_upload_path = 'uploads/' . $new_doc_name;
            move_uploaded_file($tmp_name, $doc_upload_path);
        } else {
            $_SESSION['upload_document_err'] = '<b style="color:red">*Upload Document First...</b>';
            $flag = false;
        }
    } else {
        $new_doc_name = null;
    }

    if ($flag === true) {
        $servername = "localhost";
        $uname = "root";
        $pass = "";
        $dbname = "Schoolsystem";

        $con = mysqli_connect($servername, $uname, $pass, $dbname);

        $sql = "INSERT INTO application(username,application_type,doc_id,approval) 
        VALUES('" . $_SESSION['username'] . "', '" . $sick_leave_type . "', '" . $new_doc_name . "', '" . $approval . "')";
        mysqli_query($con, $sql);
        header("Location: welcome_student.php");
    } else {
        header('location:studentdashboard.php');
    }
}

function sanitize($data)
{
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
}
