<?php

require 'db_config.php'; 

$mensaje = '';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $nombre = trim($_POST['nombre']);
    $apellido = trim($_POST['apellido']); 
    $id = trim($_POST['id']); 
    $correo = trim($_POST['correo']);
    $contrasena = $_POST['contrasena'];
    $fecha_nacimiento = $_POST['fecha_nacimiento']; 

    
    if (empty($nombre) || empty($apellido) || empty($id) || empty($correo) || empty($contrasena) || empty($fecha_nacimiento)) {
        $mensaje = "Todos los campos son obligatorios.";
    } elseif (!filter_var($correo, FILTER_VALIDATE_EMAIL)) {
        $mensaje = "El formato del correo electrónico no es permitido.";
    } else {
        
        $contrasena_hash = password_hash($contrasena, PASSWORD_DEFAULT);

    
        try {
            $stmt = $pdo->prepare("INSERT INTO usuarios (nombre, apellido, id, correo, contrasena, fecha_nacimiento) VALUES (?, ?, ?, ?, ?, ?)");
            $stmt->execute([$nombre, $apellido, $id, $correo, $contrasena_hash, $fecha_nacimiento]);
            
            $mensaje = "✅ ¡Bienvenido a la familia! ahora puedes iniciar sesión.";
        } catch (PDOException $e) {
            if ($e->getCode() == '23000') { 
                // Error 23000 es para clave duplicada (correo o ID)
                $mensaje = "El correo o el ID ya están registrados.";
            } else {
                $mensaje = "Error al registrar el usuario: " . $e->getMessage();
            }
        }
    }
}
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Registro de Usuario</title>
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

            background-image: url('imagenes/registro.png'); 
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
        input[type="text"],
        input[type="email"],
        input[type="password"],
        input[type="date"] {
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
        .message-success {
            color: green;
            text-align: center;
            font-weight: bold;
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
        <h2> Registrate con confianza</h2>
        <?php if ($mensaje): ?>
            <p class="<?= (strpos($mensaje, '✅') !== false) ? 'message-success' : 'message-error'; ?>">
                <?= $mensaje ?>
            </p>
        <?php endif; ?>
        <form action="registro.php" method="POST">
            <label>Nombre:</label>
            <input type="text" name="nombre" required>
            
            <label>Apellido:</label>
            <input type="text" name="apellido" required>
            
            <label>ID (Cédula):</label>
            <input type="text" name="id" required>
            
            <label>Correo:</label>
            <input type="email" name="correo" required>
            
            <label>Contraseña:</label>
            <input type="password" name="contrasena" required>
            
            <label>Fecha de Nacimiento:</label>
            <input type="date" name="fecha_nacimiento" required>
            
            <button type="submit">Registrarme</button>
        </form>
        <p>¿Ya tienes una cuenta? <a href="login.php">¡Inicia Sesión Aquí!</a></p>
    </div>
</body>
</html>