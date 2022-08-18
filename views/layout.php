<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Folck Clothes</title>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;700;900&display=swap" rel="stylesheet"> 
    <link rel="stylesheet" href="/build/css/app.css">
</head>
<body>
    <div class="contenedor-app">
        <div class="imagen"></div>
        <div class="app">
        <?php echo $contenido; ?>
        </div>
    </div>

    <div>
        <footer class="pie-pagina">Todos los derechos reservados a 
                <a href="#">Edgar Ivan Quiroz Calderon</a>
                <a href="#">Hector Aaron Jaimez Laureles</a>
        </footer>
    </div>

    <?php
     echo $script ?? '';
    ?>
</body>
</html>