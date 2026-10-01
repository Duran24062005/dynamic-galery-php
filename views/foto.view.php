<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>
        <?php if (!empty($foto['titulo'])) {
            echo $foto['titulo'];
        } else {
            echo 'Sin título';
        }
        ?>
    </title>
    <link rel="icon" href="<?php echo htmlspecialchars(imageUrl($foto['imagen']), ENT_QUOTES, 'UTF-8'); ?>" type="image/png">
    <link rel="shortcut icon" href="<?php echo htmlspecialchars(imageUrl($foto['imagen']), ENT_QUOTES, 'UTF-8'); ?>" type="image/x-icon">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=EB+Garamond:ital,wght@0,400..800;1,400..800&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css" integrity="sha512-SnH5WK+bZxgPHs44uWIX+LLJAJ9/2PkPKZ5QiAj6Ta86w+fsb2TkcmfRyVX3pBnMFcV7oQPJkl9QevSCWr3W6A==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="css/foto_view.css">
</head>

<body>
    <header>
        <div>
            <div class="shadow"></div>
            <h1 class="titulo">
                <?php if (!empty($foto['titulo'])) {
                    echo $foto['titulo'];
                } else {
                    echo 'Sin título';
                }
                ?>
            </h1>
        </div>
    </header>

    <section class="contenedor">
        <div class="foto">
            <img src="<?php echo htmlspecialchars(imageUrl($foto['imagen']), ENT_QUOTES, 'UTF-8'); ?>" alt="<?php echo htmlspecialchars($foto['text'], ENT_QUOTES, 'UTF-8'); ?>">
            <p class="texto"><?php echo $foto['text']; ?></p>
            <div class="paginacion">
                <a href="index.php" class="izquierda"><i class="fa fa-arrow-left"></i> Atras</a>
                <form action="eliminar.php" method="post" onsubmit="return confirm('¿Seguro que deseas eliminar esta imagen de la galeria?');">
                    <input type="hidden" name="id" value="<?php echo (int) $foto['id']; ?>">
                    <button type="submit" class="boton-eliminar"><i class="fa-solid fa-trash"></i> Eliminar imagen</button>
                </form>
            </div>
        </div>

        <div class="foto" style="margin-top: 2rem; padding: 2rem;">
            <h2 style="margin-bottom: 1rem;">Actualizar datos de la imagen</h2>

            <?php if (!empty($actualizado)): ?>
                <p style="color: green; margin-bottom: 1rem;">Los datos de la imagen fueron actualizados correctamente.</p>
            <?php endif; ?>

            <?php if (!empty($errores)): ?>
                <p style="color: red; margin-bottom: 1rem;"><?php echo $errores; ?></p>
            <?php endif; ?>

            <form action="foto.php?id=<?php echo $foto['id']; ?>" method="post">
                <div style="margin-bottom: 1rem;">
                    <label for="title" style="display: block; margin-bottom: .5rem;">Titulo</label>
                    <input
                        id="title"
                        name="title"
                        type="text"
                        value="<?php echo htmlspecialchars($foto['titulo'], ENT_QUOTES, 'UTF-8'); ?>"
                        style="width: 100%; padding: .75rem;"
                        required
                    >
                </div>

                <div style="margin-bottom: 1rem;">
                    <label for="texto" style="display: block; margin-bottom: .5rem;">Descripcion</label>
                    <textarea
                        id="texto"
                        name="texto"
                        style="width: 100%; min-height: 140px; padding: .75rem;"
                        required
                    ><?php echo htmlspecialchars($foto['text'], ENT_QUOTES, 'UTF-8'); ?></textarea>
                </div>

                <button type="submit" style="padding: .75rem 1rem; cursor: pointer;">Guardar cambios</button>
            </form>
        </div>
    </section>

    <footer>
        <p class="copyright">Galeria creada por <span class="nombre">Alexi Dg.</span> con Html, Css y php &copy; Copyright</p>
    </footer>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>

</body>

</html>
