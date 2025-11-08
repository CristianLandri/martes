<?php
require_once '../config/database.php';

session_start();

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $data = json_decode(file_get_contents("php://input"));
    
    if (!isset($_SESSION['user_id'])) {
        echo json_encode(["success" => false, "message" => "Por favor inicia sesión primero"]);
        exit;
    }
    
    $user_id = $_SESSION['user_id'];
    $course_id = $data->course_id;
    
    $stmt = $conn->prepare("INSERT INTO cart (user_id, course_id) VALUES (?, ?)");
    $stmt->bind_param("ii", $user_id, $course_id);
    
    if ($stmt->execute()) {
        echo json_encode(["success" => true, "message" => "Curso agregado al carrito"]);
    } else {
        echo json_encode(["success" => false, "message" => "Error al agregar al carrito"]);
    }
}
?>