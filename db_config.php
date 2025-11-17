<?php


define('DB_HOST', 'localhost');
define('DB_NAME', 'santiago_bd');
define('DB_USER', 'root');
define('DB_PASS', ''); 


try {
    
   $dsn = "mysql:host=" . DB_HOST . ";port=3307;dbname=" . DB_NAME . ";charset=utf8mb4";
    
   
    $opciones = [
        PDO::ATTR_ERRMODE            => PDO::ERRMODE_EXCEPTION,
        PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
        PDO::ATTR_EMULATE_PREPARES   => false, 
    ];
    
   
    $pdo = new PDO($dsn, DB_USER, DB_PASS, $opciones);
    
} catch (PDOException $e) {
   
    die("Error de conexión a la base de datos: " . $e->getMessage());
}
?>