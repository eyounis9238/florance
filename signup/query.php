<?php
require('database.php');

if (!isset($_GET['q'])) {
    http_response_code(400);
    die();
}

$sort_by = $_GET['q'];

$sort_by_clean = prepare_string($dbc, $sort_by);

$q = "SELECT user_id, name, email, phone FROM tblsignup ORDER BY $sort_by_clean LIMIT 10;";

$results = @mysqli_query($dbc, $q);
$data = [];

while ($row = mysqli_fetch_array($results, MYSQLI_ASSOC)) {
    $data[] = $row;
}

header('Content-Type: application/json');
echo json_encode($data);
exit;
?>
