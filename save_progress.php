<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);

$username = $_POST['username'];
$progress = $_POST['progress'];

// Verificar si se recibieron los datos
if (empty($username) || empty($progress)) {
    echo json_encode(["status" => "error", "message" => "Datos incompletos"]);
    exit;
}

// Crear la carpeta del usuario si no existe
$userFolder = "users/$username";
if (!file_exists($userFolder)) {
    if (!mkdir($userFolder, 0777, true)) {
        echo json_encode(["status" => "error", "message" => "No se pudo crear la carpeta del usuario"]);
        exit;
    }
}

// Guardar el progreso en el archivo chat.txt
if (file_put_contents("$userFolder/chat.txt", $progress) === false) {
    echo json_encode(["status" => "error", "message" => "No se pudo guardar el progreso"]);
    exit;
}

echo json_encode(["status" => "success"]);
?>