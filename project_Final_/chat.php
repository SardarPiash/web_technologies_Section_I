<?php
    $username = $_SESSION['username'];
    $buyer_username = $_SESSION['user_buyer'];
    $servername = "localhost";
    $uname = "root";
    $pass = "";
    $dbname = "project";

    $con = mysqli_connect($servername, $uname, $pass, $dbname);

    if (!$con) {
        die("Connection failed: " . mysqli_connect_error());
    }
    $stmt = $con->prepare("SELECT * FROM chat WHERE username=? AND user_buyer=?");
    $stmt->bind_param("ss", $username, $buyer_username);

    $stmt->execute();
    $result = $stmt->get_result();

    echo "<table>";
    while ($row = mysqli_fetch_assoc($result)) {
        echo "<tr>";
        echo "<td>" . $row['username'] . " : " . $row['text'] . "</td>";
        echo "</tr>";
    }
    echo "</table>";

    mysqli_close($con);
?>
