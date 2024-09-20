<!DOCTYPE html>
<html lang="es">
<head>
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Actividad 2 Seguridad Web</title>
    <!-- Incluir Bootstrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
<div class="container mt-5 text-center">
    <h1>Actividad 2: Seguridad Web</h1>
    <p class="lead">Trabajo presentado por: <strong>Jhon Anthony Ortiz Burbano</strong> y <strong>Edna Carolina </strong></p>

    <!-- Opciones de navegación -->
    <div class="mt-4">
        <a href="{{ route('login') }}" class="btn btn-primary btn-lg mx-2">Iniciar sesión</a>
        <a href="{{ route('register') }}" class="btn btn-success btn-lg mx-2">Registrarse</a>
    </div>
</div>

<!-- Incluir Bootstrap JS -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
