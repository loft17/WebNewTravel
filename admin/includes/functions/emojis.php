<?php
function obtenerCategoriasEmojis($jsonFile) {
    $categorias = [];

    if (file_exists($jsonFile)) {
        $jsonData = file_get_contents($jsonFile);
        $categorias = json_decode($jsonData, true);
    }

    return $categorias;
}
?>
