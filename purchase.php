<?php

include_once 'config.php';
global $database; //use global prefix so we can reference database in this file
$dbh = new PDO($database['url'], $database['username'], $database['password']);

header('Content-Type: application/json');
$data = json_decode(file_get_contents('php://input')); //json decode input

$sql = 'INSERT INTO mweb_purchase (buyer_name, buyer_email, seating_section, num_seats) VALUES (:buyer_name, :buyer_email, :seating_section, :num_seats)';
$sth = $dbh->prepare($sql);
$params = array(
    ':buyer_name' => $data->name,
    ':buyer_email' => $data->email,
    ':seating_section' => $data->seating_section,
    ':num_seats' => $data->num_seats,
);
if($sth -> execute($params)) {
    $data->id = $dbh->lastInsertId();
} else {
    http_response_code(400); // bad request
    print(json_encode($dbh->errorInfo()));
    exit();
}

print(json_encode($data));
