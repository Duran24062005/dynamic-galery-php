<?php

declare(strict_types=1);

require __DIR__ . '/funciones.php';
$conexion = conexion();

if (!$conexion) {
    // echo 'error';
    header('Location: error.php');
    die();
}

// print_r($_FILES['foto']);
if ($_SERVER['REQUEST_METHOD'] == 'POST' && !empty($_FILES)) {
    # code...
    // print_r($_FILES);

    // coprobar si es una imagen
    $check = @getimagesize($_FILES["foto"]["tmp_name"]);
    if ($check !== false) {
        # code...
        $carpeta_destino = __DIR__ . '/img/';
        $archivo_subido = $carpeta_destino . basename($_FILES['foto']['name']);
        // echo $archivo_subido;
       move_uploaded_file($_FILES['foto']['tmp_name'], $archivo_subido);

       $statements = $conexion->prepare("INSERT INTO fotos (titulo, imagen, text) VALUES(:titulo, :imagen, :text)");
        $statements->execute(array(
            ':titulo' => $_POST['title'],
            ':imagen' => basename($_FILES['foto']['name']),
            ':text' => $_POST['texto']
        ));

        header('Location: index.php');

    } else {
        $error = 'El archivo no es una imagen o la imagen es muy pesada.';
    }
}



require __DIR__ . '/views/subir.view.php';

?>
