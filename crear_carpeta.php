<?php
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $folderName = $_POST['folderName'];
    if (!file_exists($folderName)) {
        mkdir($folderName, 0777, true);
        echo 'Carpeta creada correctamente.';
    } else {
        echo 'La carpeta ya existe.';
    }
} else {
    echo 'Método no permitido.';
}
?>