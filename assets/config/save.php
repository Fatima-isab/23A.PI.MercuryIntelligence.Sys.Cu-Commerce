<?php
if($server['REQUEST_METHOD'] == 'POST' && !empty($_FILES)){
    $check = @getimagesize($_FILES['image']['tmp_name']);
    //echo $check;
    if($check !== false){
        $ruta = '../img/';
        $file = $ruta.$_FILES['image']['name'];
        move_uploaded_file($_FILES['image']['tmp'], $file);

        $statement = $connect->prepare('INSERT INTO productos (Nombre, Ruta_Foto, Descripcion, Precio, FCaducidad) VALUES (:titles, :intro, :description, :image);');

        $statement->execute(array(
            ':Nombre' => $_POST['Nombre'],
            ':Ruta_Foto' => $_FILES['image']['name'],
            ':Descripcion' => $_POST['Descripcion'],
            ':Precio' => $_POST['Precio'],
            ':Fcaducidad' => $_DATE['FCaducidad']
        ));

        $msg = "Articulo creado con exito";
    }else{
        $msg = "El archivo no es una imagen";
    }
}