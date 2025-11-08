<?php
require_once 'includes/courses.php';
$courses = getCourses();
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tienda de Cursos - Prototipo</title>
    
    <link href="Static/bootstrap-5.3.7-dist/bootstrap-5.3.7-dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.0/font/bootstrap-icons.css">
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;700&display=swap" rel="stylesheet">
    <style>
        body {
            font-family: 'Roboto', sans-serif;
            background-color: #f8f9fa;
        }
        .navbar {
            box-shadow: 0 2px 4px rgba(0,0,0,0.1);
        } 
        .card {
            transition: transform 0.3s ease, box-shadow 0.3s ease;
            border: none;
            border-radius: 10px;
        }
        .card:hover {
            transform: translateY(-5px);
            box-shadow: 0 4px 8px rgba(0,0,0,0.2);
        }
        .btn-success {
            background-color: #28a745;
            border-color: #28a745;
            transition: background-color 0.3s ease;
        }
        .btn-success:hover {
            background-color: #218838;
        }
        .hero-bg {
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            color: white;
        }
        .testimonial {
            background-color: #fff;
            border-radius: 10px;
            padding: 20px;
            box-shadow: 0 2px 4px rgba(0,0,0,0.1);
        }
    </style>
</head>
<body>
    <nav class="navbar navbar-expand-lg navbar-dark bg-primary">
        <div class="container">
            <a class="navbar-brand fw-bold" href="#">Programa La Vida</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav me-auto">
                    <li class="nav-item">
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">Cursos</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="Contacto.php">Contacto</a>
                    </li>
                </ul>
               
                <a href="#" class="btn btn-outline-light"><i class="bi bi-cart"></i> Carrito (0)</a>
            </div>
        </div>
    </nav>

    <section class="hero-bg py-5">
        <div class="container text-center">
            <h1 class="display-4 fw-bold">Aprende con Nuestros Cursos</h1>
            <p class="lead">Mejores cursos de programación de todo Berazategui</p>
            <a href="#cursos" class="btn btn-light btn-lg">Ver Cursos</a>
        </div>
    </section>

    <section id="cursos" class="py-5">
        <div class="container">
            <h2 class="text-center mb-4">Cursos Destacados</h2>
            <div class="row">
                <?php foreach ($courses as $course): ?>
                <div class="col-md-4 mb-4">
                    <div class="card h-100">
                        <img src="<?php echo htmlspecialchars($course['image_url']); ?>" class="card-img-top" alt="<?php echo htmlspecialchars($course['title']); ?>">
                        <div class="card-body">
                            <h5 class="card-title"><?php echo htmlspecialchars($course['title']); ?></h5>
                            <p class="card-text"><?php echo htmlspecialchars($course['description']); ?></p>
                            <p class="text-primary fw-bold">$<?php echo number_format($course['price'], 2); ?></p>
                            <a href="#" class="btn btn-success" onclick="addToCart(<?php echo $course['id']; ?>)">Comprar Ahora</a>
                        </div>
                    </div>
                </div>
                <?php endforeach; ?>
            </div>
        </div>
    </section>

    <script src="Static/bootstrap-5.3.7-dist/bootstrap-5.3.7-dist/js/bootstrap.bundle.min.js"></script>
    <script>
    function addToCart(courseId) {
        fetch('handlers/cart_handler.php', {
            method: 'POST',
            headers: {
                'Content-Type': 'application/json',
            },
            body: JSON.stringify({
                course_id: courseId
            })
        })
        .then(response => response.json())
        .then(data => {
            if (data.success) {
                alert('Curso agregado al carrito');
            } else {
                alert('Error al agregar el curso al carrito');
            }
        })
        .catch((error) => {
            console.error('Error:', error);
        });
    }
    </script>
</body>
</html>