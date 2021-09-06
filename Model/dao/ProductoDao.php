<?php

class ProductoDao
{
    private $mensaje;

    function registrar(ProductoDto $productoDto)
    {
        $cnn = Conexion::getConexion();
        try {
            $query = $cnn->prepare("INSERT INTO producto values (?, ?, ?, ?, ?, ?)");
            $query->bindParam(1, $productoDto->getImagen());
            $query->bindParam(2, $productoDto->getNombre());
            $query->bindParam(3, $productoDto->getDescripcion());
            $query->bindParam(4, $productoDto->getCantidad());
            $query->bindParam(5, $productoDto->getPrecio());
            $query->bindParam(6, $productoDto->getIdUsuarioCreacion()->getIdUsuario());
            $query->execute();
            $mensaje = "Se ha registrado exitosamente.";
        } catch (Exception $ex) {
            $mensaje = "Error: " . $ex->getMessage() . ".";
        }
        $cnn = null;
        return $mensaje;
    }

    function modificar(ProductoDto $productoDto)
    {
        $cnn = Conexion::getConexion();
        try {
            $query = $cnn->prepare("UPDATE producto SET idProducto = ?, imagen = ?, nombre = ?, descripcion = ?, cantidad = ?, precio = ?, idUsuarioCreacion = ? WHERE idProducto = ?");
            $query->bindParam(1, $productoDto->getIdProducto());
            $query->bindParam(2, $productoDto->getImagen());
            $query->bindParam(3, $productoDto->getNombre());
            $query->bindParam(4, $productoDto->getDescripcion()); 
            $query->bindParam(5, $productoDto->getCantidad());
            $query->bindParam(6, $productoDto->getPrecio());
            $query->bindParam(7, $productoDto->getIdUsuarioCreacion()->getIdUsuario());
            $query->bindParam(8, $productoDto->getIdProducto());
            $query->execute();
            $mensaje = "Se ha actualizado exitosamente.";
        } catch (Exception $ex) {
            $mensaje = "Error: " . $ex->getMessage() . ".";
        }
        $cnn = null;
        return $mensaje;
    }

    function obtenerTodos()
    {
        $cnn = Conexion::getConexion();
        try {
            $query = $cnn->prepare("SELECT * FROM producto");
            $query->execute();
            return $query->fetchAll();
        } catch (Exception $ex) {
            $mensaje = "Error: " . $ex->getMessage() . ".";
        }
        $cnn = null;
        return $mensaje;
    }

    function obtenerProducto($idProducto)
    {
        $cnn = Conexion::getConexion();
        try {
            $query = $cnn->prepare('SELECT * FROM producto WHERE idProducto = ?');
            $query->bindParam(1, $idProducto);
            $query->execute();
            return $query->fetch();
        } catch (Exception $ex) {
            $mensaje = "Error: " . $ex->getMessage() . ".";
        }
        $cnn = null;
        return $mensaje;
    }

    function obtenerProductos($listaProducto)
    {
        $cnn = Conexion::getConexion();
        try {
            $in  = str_repeat('?,', count($listaProducto) - 1) . '?';
            $query = $cnn->prepare("SELECT * FROM producto WHERE idProducto in ($in)");
          
          print_r ($listaProducto);
            $query->execute($listaProducto);
            return $query->fetchAll();
        } catch (Exception $ex) {
            echo $ex;
            return array();
        }
        $cnn = null;
    }

    function eliminar($idProducto)
    {
        $cnn = Conexion::getConexion();
        try {
            $query = $cnn->prepare("DELETE FROM producto WHERE idProducto = ?");
            $query->bindParam(1, $idProducto);
            $query->execute();
            $mensaje = "Se ha eliminado exitosamente.";
        } catch (Exception $ex) {
            $mensaje = "Error: " . $ex->getMessage() . ".";
        }
        $cnn = null;
        return $mensaje;
    }
}
?>