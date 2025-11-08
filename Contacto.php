<?php
require_once 'config/database.php';
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Contacto - Tienda de Cursos</title>
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
        .contact-form {
            background-color: #fff;
            border-radius: 10px;
            padding: 30px;
            box-shadow: 0 4px 8px rgba(0,0,0,0.1);
        }
        .btn-primary {
            background-color: #007bff;
            border-color: #007bff;
            transition: background-color 0.3s ease;
        }
        .btn-primary:hover {
            background-color: #0056b3;
        }
        .contact-info {
            background-color: #fff;
            border-radius: 10px;
            padding: 30px;
            box-shadow: 0 4px 8px rgba(0,0,0,0.1);
        }
        .map-container {
            border-radius: 10px;
            overflow: hidden;
            box-shadow: 0 4px 8px rgba(0,0,0,0.1);
        }
    </style>
</head>
<body>
    <nav class="navbar navbar-expand-lg navbar-dark bg-primary">
        <div class="container">
            <a class="navbar-brand fw-bold" href="prototipo.php">Programa La Vida</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav me-auto">
                    <li class="nav-item">
                        <a class="nav-link" href="prototipo.php">Inicio</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">Cursos</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link active" href="#">Contacto</a>
                    </li>
                </ul>
                <a href="#" class="btn btn-outline-light"><i class="bi bi-cart"></i> Carrito (0)</a>
            </div>
        </div>
    </nav>

    <section class="bg-primary text-white py-5">
        <div class="container text-center">
            <h1 class="display-4 fw-bold">Contáctanos</h1>
            <p class="lead">¿Tienes preguntas? Estamos aquí para ayudarte.</p>
        </div>
    </section>

    <section class="py-5">
        <div class="container">
            <div class="row">
                <div class="col-lg-6 mb-4">
                    <div class="contact-form">
                        <h3>Envíanos un mensaje</h3>
                        <form id="contactForm" onsubmit="return sendMessage(event)">
                            <div class="mb-3">
                                <label for="name" class="form-label">Nombre</label>
                                <input type="text" class="form-control" id="name" name="name" required>
                            </div>
                            <div class="mb-3">
                                <label for="email" class="form-label">Correo Electrónico</label>
                                <input type="email" class="form-control" id="email" name="email" required>
                            </div>
                            <div class="mb-3">
                                <label for="subject" class="form-label">Asunto</label>
                                <input type="text" class="form-control" id="subject" name="subject" required>
                            </div>
                            <div class="mb-3">
                                <label for="message" class="form-label">Mensaje</label>
                                <textarea class="form-control" id="message" name="message" rows="5" required></textarea>
                            </div>
                            <button type="submit" class="btn btn-primary">Enviar Mensaje</button>
                        </form>
                    </div>
                </div>
                <div class="col-lg-6 mb-4">
                    <div class="contact-info">
                        <h3>Información de Contacto</h3>
                        <p><i class="bi bi-geo-alt-fill text-primary me-2"></i> Calle Ficticia 123, Ciudad, País</p>
                        <p><i class="bi bi-telephone-fill text-primary me-2"></i> +1 234 567 890</p>
                        <p><i class="bi bi-envelope-fill text-primary me-2"></i> info@tiendadecursos.com</p>
                        <p><i class="bi bi-clock-fill text-primary me-2"></i> Lunes a Viernes: 9:00 AM - 6:00 PM</p>
                        <h4 class="mt-4">Síguenos</h4>
                        <a href="#" class="text-primary me-3"><i class="bi bi-facebook fs-4"></i></a>
                        <a href="#" class="text-primary me-3"><i class="bi bi-twitter fs-4"></i></a>
                        <a href="#" class="text-primary"><i class="bi bi-instagram fs-4"></i></a>
                    </div>
                </div>
            </div>
            <div class="row mt-5">
                <div class="col-12">
                    <h3 class="text-center mb-4">Nuestra Ubicación</h3>
                    <div class="map-container">
                        <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3153.835434509374!2d-122.419415484681!3d37.774929779759!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x80858064c6b3a881%3A0x1b0d6b0d0d0d0d0d!2sSan%20Francisco%2C%20CA!5e0!3m2!1sen!2sus!4v1633020000000!5m2!1sen!2sus" width="100%" height="400" style="border:0;" allowfullscreen="" loading="lazy"></iframe>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <footer class="bg-dark text-white py-4">
        <div class="container text-center">
            <p>&copy; 2023 Tienda de Cursos. Todos los derechos reservados.</p>
            <p>Síguenos en: <a href="https://www.tiktok.com/@proyectotecnica4bera?_r=1&_t=ZM-91Ba9VKleLj" class="text-white me-2">TikTok<i class="bi bi-tiktok"></i></a> <a href="https://youtube.com/@programalavida?si=rXHnyJ8Cswu8aGDd" class="text-white me-2">YouTube<i class="bi bi-youtube"></i></a> <a href="https://www.instagram.com/programalavida?igsh=OGN6MDQ2N3DUMHNn" class="text-white">Instagram<i class="bi bi-instagram"></i></a></p>
        </div>
    </footer>

    <script src="Static/bootstrap-5.3.7-dist/bootstrap-5.3.7-dist/js/bootstrap.bundle.min.js"></script>
    <script>
    function sendMessage(event) {
        event.preventDefault();
        
        const formData = new FormData(document.getElementById('contactForm'));
        
        fetch('handlers/contact_handler.php', {
            method: 'POST',
            body: formData
        })
        .then(response => response.json())
        .then(data => {
            if (data.success) {
                alert('Mensaje enviado correctamente');
                document.getElementById('contactForm').reset();
            } else {
                alert('Error al enviar el mensaje');
            }
        })
        .catch(error => {
            console.error('Error:', error);
            alert('Error al enviar el mensaje');
        });
        
        return false;
    }
    </script>
</body>
</html>