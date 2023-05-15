<?php
header("Content-type: application/json");
header("Access-Control-Allow-Origin: *");
header("Access-Control-Allow-Methods:DELETE");
header("Access-Control-Allow-Headers: Access-Control-Allow-Headers, Content-Type, Access-Control-Allow-Methods, Authorization, X-Requested-With");
include "config.php";

$product_id = $_GET['id'];

$sql = "DELETE FROM products WHERE id = {$product_id}";
if ($conn->query($sql)) {
    echo json_encode(["message" => "data deleted successfully", "status" => true]);
} else {
    echo json_encode(["message" => "data not deleted" . $conn->error, "status" => false]);
}
