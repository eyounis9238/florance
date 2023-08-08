<?php
	require('database.php');

	if(!isset($_GET['e'])) {
		http_response_code(400);
		die();
	}

	$email = $_GET['e'];

	$email_clean = prepare_string($dbc, $email);

	$q = "SELECT COUNT(name) AS found FROM users WHERE email = ?;";

	$stmt = mysqli_prepare($dbc, $q);

	mysqli_stmt_bind_param(
		$stmt,
		's',
		$email_clean
	);

	$result = mysqli_stmt_execute($stmt);

	mysqli_stmt_bind_result($stmt, $found);
	mysqli_stmt_fetch($stmt);

	$status = 'valid';

	if($found) {
		$status = 'duplicate';
	}

	header('Content-Type: application/json');
	echo json_encode(array('status' => $status));
	exit;
?>