<?php

function subir_imagen() {
    if(isset($_FILES["imagen_usuario"])) {
        
        //se crea la variable extension para que me guarde esta extension
        $extension = explode('.', $_FILES["imagen_usuario"]['name']);
        
        //rand para valor diferente de imagenes, asi se evita que, si es del mismo nombre no pueda reemplazarlo, si fuera asi seria muy problematico para la app
        //y a $extension le agregamos el valor del array 1, que vendria siendo " $_FILES["imagen_usuario"] " de la linea 7
        $nuevo_nombre = rand() . '.' . $extension[1];

        $ubicacion = '../img/' . $nuevo_nombre;
        move_uploaded_file($_FILES["imagen_usuario"]['tmp_name'], $ubicacion);

        return $nuevo_nombre;
    }
}

function obtener_nombre_imagen($id_usuario) {

    include('../conn/conn.php');

    $query = $conn->prepare("SELECT imagen from cliente WHERE id='$id_usuario'");

    $query->execute();

    $resultado = $query->fetchAll();

    foreach($resultado as $fila){
        return $fila["imagen"];
    }
}

function obtener_registros() {

    include('../conn/conn.php');

    $query = $conn->prepare("SELECT * from cliente");

    $query->execute();

    $resultado = $query->fetchAll();

    return $query->rowCount();
}

?>