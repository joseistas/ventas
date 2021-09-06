<?php
require "../Model/dto/ProductoDto.php";
require "../Model/dao/ProductoDao.php";

 session_start();
 if (!isset($_SESSION['productos'])) {
     $_SESSION['productos']=array();
 }
 if(isset($_POST["evento"])){
    $idProducto= $_POST['idProducto'];

    array_push($_SESSION['productos'], $idProducto);
}

$productoDao = new ProductoDao();
$listaProducto = $productoDao->obtenerTodos();
if(count( $_SESSION['productos']) > 0){
    $listaProductoSel= $productoDao->obtenerProductos($_SESSION['productos']);
}else{
    $listaProductoSel==array();
}

function contarProductoSele($idProducto){
    $cont = 0;
    foreach($_SESSION['productos'] as $item){

        if ($idProducto == $item) {
            $cont++;
        }
    }
    return $cont;

}


?>