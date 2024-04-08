<?php
require_once "../classes/Db_conn.php";
require_once "../classes/Pdo_methods.php";

$pdo = new PdoMethods();
$sql = "SELECT name FROM names ORDER BY name";
$result = $pdo->selectNotBinded($sql);

if ($result !== 'error') {
    $names = array_column($result, 'name');
    $namesList = implode('</p><p>', $names);
    echo json_encode(["masterstatus" => "success", "names" => "<p>{$namesList}</p>"]);
} else {
    echo json_encode(["masterstatus" => "error", "msg" => "Failed to retrieve names from the database."]);
}
?>
