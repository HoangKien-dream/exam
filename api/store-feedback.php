<?php
$data = json_decode(file_get_contents("php://input"), true);
$name = $data['name'];
$email = $data['email'];
$telephone = $data['telephone'];
$content = $data['content'];


$servername = "localhost";
$username = "root";
$password = "";
$dbname = "dw";

$conn = new mysqli($servername,$username,$password,$dbname);

if ($conn->connect_error){
    die("Connection failed: " . $conn->connect_error);
}
$sql = "INSERT INTO `feed-back` (name, email, phone, content) VALUES ('" . $name . "','" . $email . "','" . $telephone . "','" . $content . "')";

// config respone data kiểu json
header('Content-Type: application/json; charset=utf-8');
if ($conn->query($sql) === TRUE){
    $data = new stdClass();
    $data->message = 'Action success';
    http_response_code(201);
    echo json_encode($data);
} else{
    $data = new stdClass();
    $data->message = 'Action fails';
    http_response_code(500);
    echo json_encode($data);
}
$conn->close();
?>
