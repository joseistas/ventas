<?php
session_start();
require '../../Core/conexion.php';
$cnn = Conexion::getConexion();
$usu = $_POST['usuario'];
$contra = $_POST['pass'];

$sentencia = $cnn->prepare ("SELECT *  FROM ventaproductos.usuario WHERE idUsuario = ? and  contrasena = ?;");
$sentencia->execute([$usu, $contra]);
$valor = $sentencia->fetch(PDO::FETCH_OBJ);

if($valor->nombre_usu === $usu){
    header('Location:index.php');

}else{
    header('Location:login.php');

}
?>