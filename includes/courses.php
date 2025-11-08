<?php
require_once '../config/database.php';

function getCourses() {
    global $conn;
    $sql = "SELECT * FROM courses";
    $result = $conn->query($sql);
    $courses = [];
    
    if ($result->num_rows > 0) {
        while($row = $result->fetch_assoc()) {
            $courses[] = $row;
        }
    }
    
    return $courses;
}
?>