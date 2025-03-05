<?php
require_once '../auth.php';
require_once '../functions.php'; // Incluye la configuración de la BD

// Conectar a la base de datos
$conn = new mysqli(DB_HOST, DB_USER, DB_PASS, DB_NAME);
if ($conn->connect_error) {
    die("Error de conexión: " . $conn->connect_error);
}

// Definir nombre del archivo
$fecha = date("Y-m-d_H-i-s");
$filename = "backup_$fecha.json";

// Obtener todas las tablas
$tables = [];
$result = $conn->query("SHOW TABLES");
while ($row = $result->fetch_array()) {
    $tables[] = $row[0];
}

// Array para almacenar los datos de la base de datos
$dbData = [];

foreach ($tables as $table) {
    // Obtener datos de la tabla
    $query = "SELECT * FROM `$table`";
    $result = $conn->query($query);
    
    if ($result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {
            $dbData[$table][] = $row; // Guardar registros en el array
        }
    } else {
        $dbData[$table] = []; // Tabla vacía
    }
}

// Cerrar conexión
$conn->close();

// Convertir a JSON
$jsonData = json_encode($dbData, JSON_PRETTY_PRINT | JSON_UNESCAPED_UNICODE);

// Configurar cabeceras para la descarga
header('Content-Type: application/json; charset=UTF-8');
header("Content-Disposition: attachment; filename=$filename");

// Imprimir JSON para la descarga
echo $jsonData;
exit();
?>
