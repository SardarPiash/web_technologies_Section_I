
<?php 
require '../model/search.php';
if ($_SERVER["REQUEST_METHOD"] === "GET") {

	$key = sanitize($_GET['username']);
	$res = search1($key);
		if (mysqli_num_rows($res) == 0) {
			echo "<b style='color: red'>Username Not Found...</b>";
		} else {
			while ($row = mysqli_fetch_assoc($res)) {
				if ($key == $row['username']) {
					echo "<table border='1px' align='center' style='border: 1px solid red'><tr><td>";
					echo "<b>Username: </b>" . $row['username'] . "<br>";
					echo "<b>Password: </b>" . $row['password'] . "<br><br>";
					echo "</td></tr></table>";
				}
			}
			// if ($key != $row['username']) {
			// 	echo "<b style='color: red'>Username Not Found..</b>";
			// }
		}
}

function sanitize($data) {
	$data = trim($data);
	$data = stripslashes($data);
	$data = htmlspecialchars($data);
	return $data;
}

?>