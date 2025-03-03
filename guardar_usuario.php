<?php
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $usuario = $_POST['usuario'];
    file_put_contents('usuarios.txt', $usuario, FILE_APPEND);
    echo 'Usuario guardado correctamente.';
} else {
    echo 'Método no permitido.';
}
?>