<?php
require_once "../classes/Db_conn.php";
require_once "../classes/Pdo_methods.php";


$data = json_decode(file_get_contents('php://input'), true);

if (!isset($data['name']) || empty(trim($data['name']))) {
    echo json_encode(["masterstatus" => "error", "msg" => "Name is required."]);
    exit;
}

list($firstName, $lastName) = explode(' ', $data['name'], 2);
$formattedName = $lastName . ', ' . $firstName;

$pdo = new PdoMethods();
$sql = "INSERT INTO names (name) VALUES (:name)";
$bindings = [["name", $formattedName, "str"]];

$result = $pdo->otherBinded($sql, $bindings);

if ($result == "noerror") {
    echo json_encode(["masterstatus" => "success", "msg" => "Name added successfully."]);
} else {
    echo json_encode(["masterstatus" => "error", "msg" => "Failed to add the name. Please try again."]);
}
?>
