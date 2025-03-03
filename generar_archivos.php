<?php
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $folderName = $_POST['folderName'];
    if (file_exists($folderName)) {
        file_put_contents("$folderName/chat.txt", "");
        file_put_contents("$folderName/diariodigital.txt", "");
        echo 'Archivos creados correctamente.';
    } else {
        echo 'La carpeta no existe.';
    }
} else {
    echo 'Método no permitido.';
}
?>