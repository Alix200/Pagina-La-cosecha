<?php
// Obtén el término de búsqueda
$searchTerm = $_GET['search'];

// Array de archivos donde buscar
$archivos = ['LAUREN.HTML', 'CEREZO.HTML', 'PINO.HTML', 'NOGAL.HTML', 'ROBLE.HTML'];

// Inicializa el contenido de resultados
$resultados = '';

// Recorre los archivos y busca el término de búsqueda
foreach ($archivos as $archivo) {
    // Lee el contenido del archivo
    $contenido = file_get_contents($archivo);

    // Busca el término de búsqueda en el contenido
    if (stripos($contenido, $searchTerm) !== false) {
        // Si se encuentra el término, agrega un enlace al archivo como resultado
        $resultados .= "<a href='$archivo' target='frmCuerpo'>$archivo</a><br>";
    }
}

// Si no se encontraron resultados, muestra un mensaje
if (empty($resultados)) {
    $resultados = 'No se encontraron resultados.';
}

// Muestra los resultados en el iframe
echo $resultados;
?>

<form class="search-form" action="buscar.php" method="GET" target="CUERPO.HTML">
    <input type="text" name="search" placeholder="Buscar..." required>
    <button type="submit">Buscar</button>
</form>
