<?php
require "../Model/dto/ProductoDto.php";
require "../Model/dao/ProductoDao.php";

 session_start();
 if (!isset($_SESSION['productos'])) {
     $_SESSION['productos']=array();
 }
 if(isset($_POST["evento"])){
    $idProducto= $_POST['idProducto'];
    if($_POST["evento"] =="delete"){
        foreach($_SESSION['productos'] as $i=>$item){
           if($idProducto == $item){
            unset($_SESSION['productos'][$i]); 
            $_SESSION['productos']=array_values($_SESSION['productos']);
            break;
           }
        }
    }else{
        array_push($_SESSION['productos'], $idProducto);
    }
}
if(isset($_POST["limpiar"])){
    $_SESSION['productos']=array();
}

$productoDao = new ProductoDao();
$listaProducto = $productoDao->obtenerTodos();
$listaProductoSel = array();
if(count( $_SESSION['productos']) > 0){
    $listaProductoSel= $productoDao->obtenerProductos($_SESSION['productos']);
}else{
    $listaProductoSel = array();
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