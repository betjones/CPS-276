<?php
require_once "../classes/Db_conn.php";
require_once "../classes/Pdo_methods.php";

$pdo = new PdoMethods();
$sql = "TRUNCATE TABLE names";
$result = $pdo->otherNotBinded($sql);

if ($result === 'noerror') {
    echo json_encode(["masterstatus" => "success", "msg" => "Names cleared successfully."]);
} else {
    echo json_encode(["masterstatus" => "error", "msg" => "Failed to clear names from the database."]);
}
?>
