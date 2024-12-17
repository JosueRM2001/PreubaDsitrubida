<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Galería de Imágenes</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 20px;
        }
        h1 {
            text-align: center;
        }
        .gallery {
            display: flex;
            flex-wrap: wrap;
            gap: 10px;
            justify-content: center;
        }
        .gallery img {
            width: 200px;
            height: 150px;
            object-fit: cover;
            border: 1px solid #ccc;
            border-radius: 5px;
        }
        .upload-form {
            text-align: center;
            margin-bottom: 20px;
        }
    </style>
</head>
<body>
    <h1>Galería de Imágenes</h1>

    <div class="upload-form">
        <form action="upload.php" method="post" enctype="multipart/form-data">
            <input type="file" name="image" required>
            <button type="submit">Subir Imagen</button>
        </form>
    </div>

    <div class="gallery">
        <?php
        $images = glob('uploads/*.{jpg,jpeg,png,gif}', GLOB_BRACE);
        if ($images) {
            foreach ($images as $image) {
                echo "<img src='$image' alt='Imagen'>";
            }
        } else {
            echo "<p>No hay imágenes en la galería.</p>";
        }
        ?>
    </div>
</body>
</html>


