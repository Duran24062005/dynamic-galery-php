<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Galeria</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=EB+Garamond:ital,wght@0,400..800;1,400..800&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css" integrity="sha512-SnH5WK+bZxgPHs44uWIX+LLJAJ9/2PkPKZ5QiAj6Ta86w+fsb2TkcmfRyVX3pBnMFcV7oQPJkl9QevSCWr3W6A==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="css/styles.css">
</head>

<body>
    <section class="agregar">
        <a href="subir.php" class="derecha">
            <i class="fa-regular fa-image"></i>
            Subir Foto
        </a>
    </section>
    
    <header>
        <div>
            <div class="shadow"></div>
            <h1 class="titulo">Increible Galeria con Php y MySQL</h1>
        </div>
    </header>


    <section class="fotos">
        <div class="contenedor">

            <?php foreach ($fotos as $foto) : ?>
                <div class="foto">
                    <a href="foto.php?id=<?php echo $foto['id']; ?>">
                        <img src="<?php echo htmlspecialchars(imageUrl($foto['imagen']), ENT_QUOTES, 'UTF-8'); ?>" alt="<?php echo htmlspecialchars($foto['text'], ENT_QUOTES, 'UTF-8'); ?>">
                    </a>
                </div>
            <?php endforeach; ?>



    </section>
    <div class="paginacion">
        <div>
            <?php if ($pagina_actual > 1) : ?>

                <a href="index.php?p=<?php echo $pagina_actual - 1; ?>" class="izquierda"><i class="fa-solid fa-arrow-left"></i>
                    Pagina Anterior
                </a>
            <?php endif; ?>
        </div>

        <?php if ($total_paginas != $pagina_actual) : ?>

            <a href="index.php?p=<?php echo $pagina_actual + 1; ?>" class="derecha">
                Pagina Siguiente <i class="fa-solid fa-arrow-right"></i>
            </a>
        <?php endif; ?>

        <!-- <a href=" #" class="izquierda"><i class="fa-solid fa-arrow-left"></i>
                Pagina Anterior
            </a>
            <a href="subir.php" class="derecha">
                Pagina Siguiente <i class="fa-solid fa-arrow-right"></i>
            </a> -->
    </div>

    <footer>
        <p class="copyright">Galeria creada por <span class="nombre">Alexi Dg.</span> con Html, Css y php &copy; Copyright</p>
        <p><i class="fa-sharp fa-solid fa-file-png"></i></p>
    </footer>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>

</body>
</html>
