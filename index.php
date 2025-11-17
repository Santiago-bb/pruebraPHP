<?php

?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Bienvenido usuario de UTPL</title>
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
        
        
        background-image: url('imagenes/index.png'); 
        background-size: cover; 
        background-position: center; 
    }
        .container {
            background-color: #f4f7f6;
            padding: 40px;
            border-radius: 12px;
            box-shadow: 0 4px 15px rgba(0, 0, 0, 0.1);
            text-align: center;
        }
        h1 {
            color: #0971e1ff;
            margin-bottom: 30px;
        }
        .btn {
            padding: 12px 25px;
            font-size: 16px;
            border: none;
            border-radius: 8px;
            cursor: pointer;
            transition: background-color 0.3s ease;
            text-decoration: none; 
            display: inline-block;
            margin: 0 10px;
        }
        .btn-login {
            background-color: #179515ff; 
            color: white;
        }
        .btn-register {
            background-color: #3e3efcff; 
            color: white;
        }
        .btn:hover {
            opacity: 0.9;
        }
    </style>
</head>
<body>
    <div class="container">
        <h1> Bienvenido usuario de UTPL</h1>
        <p>Selecciona la opción que deseas:</p>
        
        <div style="margin-top: 30px;">
            <a href="login.php" class="btn btn-login">
                 Iniciar Sesión
            </a>
            
            <a href="registro.php" class="btn btn-register">
                 Registrarme
            </a>
        </div>
        
        <hr style="margin-top: 50px; border-color: #ddd;">
        <p style="font-size: 12px; color: #999;">Su seguridad es nuestra prioridad</p>
    </div>
</body>
</html>