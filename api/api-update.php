<?php
header("Content-Type: application/json");
header("Access-Control-Allow-Origin: *");
header("Access-Control-Allow-Methods: PUT");
header("Access-Control-Allow-Headers: Access-Control-Allow-Headers, Content-Type, Access-Control-Allow-Methods, Authorization, X-Requested-With");
include "config.php";

$data = json_decode(file_get_contents("php://input"), true);
$id = intval(substr($_SERVER['REQUEST_URI'], strrpos($_SERVER['REQUEST_URI'], '/') + 1));
$name = $data['name'];
$price = $data['price'];
$category = $data['category'];
$color = $data['color'];
$description = $data['description'];
$image = $data['image'];

$sql = "UPDATE products SET name = '{$name}', price = '{$price}', category='{$category}', color='{$color}', description='{$description}', image='{$image}' WHERE id = {$id}";

if ($conn->query($sql)) {
    echo json_encode(["message" => "data Updated Successfully", "status" => true]);
} else {
    echo json_encode(["message" => "data not Updated", "status" => false]);
}
