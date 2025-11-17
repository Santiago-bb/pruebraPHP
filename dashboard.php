<?php

session_start(); 


if (!isset($_SESSION['usuario_id'])) {
    header('Location: login.php');
    exit();
}


$nombre_usuario = htmlspecialchars($_SESSION['usuario_nombre']);
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Dashboard | Área Privada</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f7f6;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            margin: 0;
            color: #333;
            text-align: center;

            background-image: url('imagenes/dashboard.jpg'); 
            background-size: cover; 
            background-position: center;
        }
        .container {
            background-color: #fff;
            padding: 40px;
            border-radius: 12px;
            box-shadow: 0 4px 15px rgba(0, 0, 0, 0.1);
            width: 400px;
        }
        h2 {
            color: #28a745; 
            margin-bottom: 25px;
            font-size: 24px;
        }
        p {
            font-size: 16px;
            line-height: 1.5;
            margin-bottom: 20px;
        }
        button {
            padding: 10px 20px;
            background-color: #dc3545; 
            color: white;
            border: none;
            border-radius: 6px;
            cursor: pointer;
            font-size: 16px;
            transition: background-color 0.3s ease;
        }
        button:hover {
            background-color: #c82333;
        }
    </style>
</head>
<body>
    <div class="container">
        <h2> ¡Felicidades <?= $nombre_usuario ?>!</h2>
        <p>Has iniciado sesión correctamente.</p>
        
        <p>Si quieres cerrar sesión puedes presionar el botón correspondiente:</p>
        
        <p><a href="logout.php"><button>Cerrar Sesión</button></a></p>
    </div>
</body>
</html>