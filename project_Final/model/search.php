<?php
function search1 ($username) {

	$conn = mysqli_connect("localhost", "root", "", "project");

	$stmt = mysqli_stmt_init($conn);
	mysqli_stmt_prepare($stmt, "SELECT username, password FROM registration WHERE username like ?");
	mysqli_stmt_bind_param($stmt, "s", $username);
	mysqli_stmt_execute($stmt);
	$result = mysqli_stmt_get_result($stmt);

	return $result;
}

?>