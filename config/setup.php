<?php
require_once 'database.php';

// Create users table
$sql = "CREATE TABLE IF NOT EXISTS users (
    id INT AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(100) NOT NULL,
    email VARCHAR(100) NOT NULL UNIQUE,
    password VARCHAR(255) NOT NULL,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
)";

if (!$conn->query($sql)) {
    die("Error creating users table: " . $conn->error);
}

// Create courses table
$sql = "CREATE TABLE IF NOT EXISTS courses (
    id INT AUTO_INCREMENT PRIMARY KEY,
    title VARCHAR(200) NOT NULL,
    description TEXT,
    price DECIMAL(10,2) NOT NULL,
    image_url VARCHAR(255),
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
)";

if (!$conn->query($sql)) {
    die("Error creating courses table: " . $conn->error);
}

// Create cart table
$sql = "CREATE TABLE IF NOT EXISTS cart (
    id INT AUTO_INCREMENT PRIMARY KEY,
    user_id INT,
    course_id INT,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    FOREIGN KEY (user_id) REFERENCES users(id),
    FOREIGN KEY (course_id) REFERENCES courses(id)
)";

if (!$conn->query($sql)) {
    die("Error creating cart table: " . $conn->error);
}

// Create contact_messages table
$sql = "CREATE TABLE IF NOT EXISTS contact_messages (
    id INT AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(100) NOT NULL,
    email VARCHAR(100) NOT NULL,
    subject VARCHAR(200) NOT NULL,
    message TEXT NOT NULL,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
)";

if (!$conn->query($sql)) {
    die("Error creating contact_messages table: " . $conn->error);
}

// Insert sample courses
$sample_courses = [
    [
        'title' => 'Introducción a la Programación',
        'description' => 'Aprende los fundamentos de la programación con ejemplos prácticos.',
        'price' => 99.99,
        'image_url' => 'https://via.placeholder.com/300x200?text=Curso+1'
    ],
    [
        'title' => 'Diseño Web con Bootstrap',
        'description' => 'Crea sitios web responsivos y atractivos usando Bootstrap.',
        'price' => 79.99,
        'image_url' => 'https://via.placeholder.com/300x200?text=Curso+2'
    ]
];

$stmt = $conn->prepare("INSERT INTO courses (title, description, price, image_url) VALUES (?, ?, ?, ?)");

foreach ($sample_courses as $course) {
    $stmt->bind_param("ssds", $course['title'], $course['description'], $course['price'], $course['image_url']);
    $stmt->execute();
}

echo "Database and tables created successfully!";
?>