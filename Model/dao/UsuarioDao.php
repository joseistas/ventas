<?php
class UsuarioDao
{
    private $mensaje;

    function registrar(UsuarioDto $usuarioDto)
    {
        $cnn = Conexion::getConexion();
        try {
            $query = $cnn->prepare("INSERT INTO usuario VALUES (?, ?, ?, ?, ?)");
            $query->bindParam(1, $usuarioDto->getIdUsuario());
            $query->bindParam(2, $usuarioDto->getNombre());
            $query->bindParam(3, $usuarioDto->getApellido());
            $query->bindParam(4, $usuarioDto->getContrasena());
            $query->bindParam(5, $usuarioDto->getRol());
            $query->execute();
            $mensaje = "Se ha registrado exitosamente.";
        } catch (Exception $ex) {
            $mensaje = "Error: " . $ex->getMessage() . ".";
        }
        $cnn = null;
        return $mensaje;
    }

    function modificar(UsuarioDto $usuarioDto)
    {
        $cnn = Conexion::getConexion();
        try {
            $query = $cnn->prepare("UPDATE usuario SET idUsuario = ?, nombre = ?, apellido = ?, contrasena = ?, rol = ? WHERE idUsuario = ?");
            $query->bindParam(1, $usuarioDto->getIdUsuario());
            $query->bindParam(2, $usuarioDto->getNombre());
            $query->bindParam(3, $usuarioDto->getApellido());
            $query->bindParam(4, $usuarioDto->getContrasena());
            $query->bindParam(5, $usuarioDto->getRol());
            $query->bindParam(6, $usuarioDto->getIdUsuario());
            $query->execute();
            $mensaje = "Se ha actualizado exitosamente.";
        } catch (Exception $ex) {
            $mensaje = "Error: " . $ex->getMessage() . ".";
        }
        $cnn = null;
        return $mensaje;
    }

    function consultarId($idUsuario)
    {
        $cnn = Conexion::getConexion();
        try {
            $query = $cnn->prepare("SELECT * FROM usuario WHERE idUsuario = ?");
            $query->bindParam(1, $idUsuario);
            $query->execute();
            return $query->fetch();
        } catch (Exception $ex) {
            $mensaje = "Error: " . $ex->getMessage() . ".";
        }
        $cnn = null;
        return $mensaje;
    }

    function consultarTodos()
    {
        $cnn = Conexion::getConexion();
        try {
            $query = $cnn->prepare("SELECT * FROM usuario");
            $query->execute();
            return $query->fetchAll();
        } catch (Exception $ex) {
            $mensaje = "Error: " . $ex->getMessage() . ".";
        }
        $cnn = null;
        return $mensaje;
    }

    function eliminar($idUsuario)
    {
        $cnn = Conexion::getConexion();
        try {
            $query = $cnn->prepare("DELETE FROM usuario WHERE idUsuario = ?");
            $query->bindParam(1, $idUsuario);
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