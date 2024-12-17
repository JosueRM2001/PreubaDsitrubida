<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Galería de Imágenes</title>
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }
        body {
            font-family: 'Arial', sans-serif;
            background-color:rgb(71, 227, 206); /* Color de fondo suave */
            color: #333;
            line-height: 1.6;
        }
        h1 {
            text-align: center;
            font-size: 2.5rem;
            color: #2c3e50;
            margin-top: 20px;
        }
        .container {
            width: 90%;
            margin: 0 auto;
            max-width: 1200px;
        }
        .upload-form {
            background-color:rgb(188, 222, 225); /* Fondo blanco para el formulario */
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);
            text-align: center;
            margin-bottom: 30px;
        }
        .upload-form input[type="file"] {
            border: 1px solid #ccc;
            padding: 10px;
            border-radius: 5px;
            margin-bottom: 15px;
        }
        .upload-form button {
            background-color: #3498db;
            color: white;
            padding: 10px 20px;
            border: none;
            border-radius: 5px;
            font-size: 1rem;
            cursor: pointer;
            transition: background-color 0.3s ease;
        }
        .upload-form button:hover {
            background-color: #2980b9;
        }
        .gallery {
            display: grid;
            grid-template-columns: repeat(auto-fill, minmax(250px, 1fr));
            gap: 15px;
            margin-top: 20px;
        }
        .gallery img {
            width: 100%;
            height: 200px;
            object-fit: cover;
            border-radius: 8px;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
        }
        .no-images {
            text-align: center;
            color: #7f8c8d;
            font-size: 1.2rem;
        }
    </style>
</head>
<body>
    <div class="container">
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
                    echo "<div><img src='$image' alt='Imagen'></div>";
                }
            } else {
                echo "<p class='no-images'>No hay imágenes en la galería.</p>";
            }
            ?>
        </div>
    </div>
</body>
</html>
