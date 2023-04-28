<?php 

include '../conn/conn.php';
include 'funciones.php';


$query = "";

$salida = array();

$query = "SELECT * FROM cliente ";


// (.=) y los . entre toda la consulta, sirven para concatenar
if(isset($_POST["search"]["value"])) {

    $query .= 'WHERE nombre LIKE "%' . $_POST["search"]["value"] . '%" ';

    $query .= 'OR apellido LIKE "%' . $_POST["search"]["value"] . '%" ';


}

if(isset($_POST["order"])) {

    $query .= 'ORDER BY' . $_POST['order']['0']['column'] . ' ' . $_POST['order'][0]['dir'] . ' ';

}else {
    $query .= 'ORDER BY id DESC ';
}

if($_POST["length"] != -1){
    $query .= 'LIMIT' . $_POST["start"] . ',' . $_POST["length"];
}

$query = $conn->prepare($query);
$query->execute();
$resultado = $query->fetchAll();
$datos = array();
$filtro_rows = $query->rowCount();

foreach($resultado as $fila){
    
    $imagen = '';

    if($fila["imagen"] != ''){
        
        $imagen = 'img src="img/' . $fila["imagen"] . '" class="img-thumbnail" width="50" height="50"';
    
    }else {
        $imagen = '';
    }

    $sub_array = array();
    $sub_array[] = $fila["id"];
    $sub_array[] = $fila["rut"];
    $sub_array[] = $fila["nombre"];
    $sub_array[] = $fila["apellido"];
    $sub_array[] = $fila["telefono"];
    $sub_array[] = $fila["correo"];
    $sub_array[] = $imagen;
    $sub_array[] = $fila["fecha_reg"];
    $sub_array[] = '<button type="button" name="editar" id="' .$fila["id"]. '" class="btn btn-warning btn-xs editar">Editar</button>';
    $sub_array[] = '<button type="button" name="borrar" id="' .$fila["id"]. '" class="btn btn-warning btn-xs borrar">Borrar</button>';

    $datos = $sub_array;
}


$salida = array(

    //intval para convertir un tipo de dato a numero entero
    "draw"                     => intval($_POST["draw"]),
    "recordsTotal"             => $filtro_rows,
    "recordsFiltered"          => obtener_registros(),
    "data"                     => $datos
);

echo json_encode($salida);

?>

