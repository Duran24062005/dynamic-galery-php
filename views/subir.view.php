<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Subir foto</title>
    <link rel="icon" href="img/10.png" type="image/png">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=EB+Garamond:ital,wght@0,400..800;1,400..800&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css" integrity="sha512-SnH5WK+bZxgPHs44uWIX+LLJAJ9/2PkPKZ5QiAj6Ta86w+fsb2TkcmfRyVX3pBnMFcV7oQPJkl9QevSCWr3W6A==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet" href="css/styles_subir.css">
</head>

<body>
    <header>
        <div>
            <div class="shadow"></div>
            <h1 class="titulo">Subir foto</h1>
        </div>
    </header>

    <section class="contenedor">
        <form action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>" method="post" enctype="multipart/form-data" class="formulario">
            <div class="mb-3">
                <label for="foto" class="form-label">Elegir foto: </label>
                <input class="form-control" type="file" id="foto" name="foto" required>
            </div>
            <div class="mb-3">
                <label for="title" class="form-label">Titulo: </label>
                <input class="form-control" type="text" id="title" name="title" required>
            </div>
            <div class="mb-3">
                <label for="texto" class="form-label">Descripción: </label>
                <textarea class="form-control" id="texto" name="texto" placeholder="Ingresa una descripcón" required></textarea>
            </div>

            <button class="btn btn-success" value="subir_foto"><i class="fa-solid fa-file-arrow-up"> Up</i></button>

            <?php if(isset($errores)): ?>
                <p class="error"><?php echo $errores; ?></p>
            <?php endif; ?>

        </form>
    </section>

    <footer>
        <p class="copyright">Galeria creada por <span class="nombre">Alexi Dg.</span> con Html, Css y php &copy; Copyright</p>
    </footer>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>

</body>

</html>
