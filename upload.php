<?php
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $uploadDir = 'uploads/';
    $allowedTypes = ['image/jpeg', 'image/png', 'image/gif'];

    if (!is_dir($uploadDir)) {
        mkdir($uploadDir, 0755, true);
    }

    if (isset($_FILES['image']) && $_FILES['image']['error'] == 0) {
        $fileTmpPath = $_FILES['image']['tmp_name'];
        $fileName = basename($_FILES['image']['name']);
        $fileType = mime_content_type($fileTmpPath);

        if (in_array($fileType, $allowedTypes)) {
            $uploadPath = $uploadDir . $fileName;
            if (move_uploaded_file($fileTmpPath, $uploadPath)) {
                echo "<p>Imagen subida con éxito. <a href='index.php'>Volver a la galería</a></p>";
            } else {
                echo "<p>Error al mover la imagen al directorio de subida.</p>";
            }
        } else {
            echo "<p>Formato de archivo no permitido. Solo se aceptan JPG, PNG y GIF.</p>";
        }
    } else {
        echo "<p>Error al subir la imagen.</p>";
    }
}
?>
