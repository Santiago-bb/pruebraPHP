<?php
require 'db_config.php'; 
session_start();

$mensaje = '';


if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $correo = trim($_POST['correo']);
    $contrasena = $_POST['contrasena'];
    $captcha_usuario = $_POST['captcha_respuesta']; 

    
    if (!isset($_SESSION['captcha_resultado']) || $captcha_usuario != $_SESSION['captcha_resultado']) {
        $mensaje = "❌ Error: La respuesta del CAPTCHA es incorrecta. Inténtalo de nuevo.";
        
    } else {
       
        
        try {
            
            $stmt = $pdo->prepare("SELECT id, nombre, contrasena FROM usuarios WHERE correo = ?");
            $stmt->execute([$correo]);
            $usuario = $stmt->fetch();
            
            if ($usuario && password_verify($contrasena, $usuario['contrasena'])) {
                
                $_SESSION['usuario_id'] = $usuario['id'];
                $_SESSION['usuario_nombre'] = $usuario['nombre'];
                
                
                unset($_SESSION['captcha_resultado']);

                header('Location: dashboard.php');
                exit();
            } else {
                $mensaje = "❌ Error: Correo o contraseña incorrectos.";
            }
        } catch (PDOException $e) {
            $mensaje = "Error de base de datos: " . $e->getMessage();
        }
    }
}


if (!isset($_SESSION['captcha_resultado']) || $_SERVER['REQUEST_METHOD'] === 'POST') {
    $num1_display = rand(1, 9);
    $num2_display = rand(1, 9);
    $_SESSION['captcha_resultado'] = $num1_display + $num2_display;
} else {
   
    $num1_display = rand(1, 9);
    $num2_display = rand(1, 9);
    $_SESSION['captcha_resultado'] = $num1_display + $num2_display;
}
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Inicio de Sesión</title>
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

            background-image: url('imagenes/login.png'); 
            background-size: cover; 
            background-position: center;
        }
        .container {
            background-color: #fff;
            padding: 40px;
            border-radius: 12px;
            box-shadow: 0 4px 15px rgba(0, 0, 0, 0.1);
            width: 350px;
            
        }
        h2 {
            color: #007bff;
            text-align: center;
            margin-bottom: 25px;
        }
        label {
            font-weight: bold;
            display: block;
            margin-bottom: 5px;
            color: #555;
        }
        input[type="email"],
        input[type="password"],
        input[type="number"] {
            width: 100%;
            padding: 10px;
            margin-bottom: 15px;
            border: 1px solid #ccc;
            border-radius: 6px;
            box-sizing: border-box; 
        }
        button[type="submit"] {
            width: 100%;
            padding: 12px;
            background-color: #28a745;
            color: white;
            border: none;
            border-radius: 6px;
            cursor: pointer;
            font-size: 16px;
            transition: background-color 0.3s ease;
        }
        button[type="submit"]:hover {
            background-color: #218838;
        }
        .message-error {
            color: red;
            text-align: center;
            font-weight: bold;
        }
        p {
            text-align: center;
            margin-top: 20px;
        }
        a {
            color: #007bff;
            text-decoration: none;
        }
        a:hover {
            text-decoration: underline;
        }
    </style>
</head>
<body>
    <div class="container">
        <h2> Inicio de Sesión</h2>
        <?php if ($mensaje): ?>
            <p class="message-error"><?= $mensaje ?></p>
        <?php endif; ?>
        
        <form action="login.php" method="POST">
            <label>Correo:</label>
            <input type="email" name="correo" required>
            
            <label>Contraseña:</label>
            <input type="password" name="contrasena" required>
            
            <label>CAPTCHA: ¿Cuánto es <?= $num1_display ?> + <?= $num2_display ?>?</label>
            <input type="number" name="captcha_respuesta" required>
            
            <button type="submit">Entrar</button>
        </form>
        
        <p>¿No tienes una cuenta? <a href="registro.php">¡Únete aquí!</a></p>
    </div>
</body>
</html>