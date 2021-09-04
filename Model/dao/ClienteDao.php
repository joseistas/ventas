<?php
class ClienteDao
{
    private $mensaje;

    function consultarId($idCliente)
    {
        $cnn = Conexion::getConexion();
        try {
            $query = $cnn->prepare("SELECT * FROM cliente WHERE idCliente = ?");
            $query->bindParam(1, $idCliente);
            $query->execute();
            return $query->fetch();
        } catch (Exception $ex) {
            $mensaje = "Error: " . $ex->getMessage() . ".";
        }
        $cnn = null;
        return $mensaje;
    }

    function consultarPorIdUsuario($idUsuario)
    {
        $cnn = Conexion::getConexion();
        try {
            $query = $cnn->prepare("SELECT * FROM cliente WHERE idUsuario = ?");
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
            $query = $cnn->prepare("SELECT * FROM cliente");
            $query->execute();
            return $query->fetchAll();
        } catch (Exception $ex) {
            $mensaje = "Error: " . $ex->getMessage() . ".";
        }
        $cnn = null;
        return $mensaje;
    }

    function eliminar($idCliente)
    {
        $cnn = Conexion::getConexion();
        try {
            $query = $cnn->prepare("DELETE FROM cliente WHERE idCliente = ?");
            $query->bindParam(1, $idCliente);
            $query->execute();
            $mensaje = "Registro eliminado exitosamente.";
        } catch (Exception $ex) {
            $mensaje = "Error: " . $ex->getMessage() . ".";
        }
        $cnn = null;
        return $mensaje;
    }

    function registrar(ClienteDto $clienteDto)
    {
        $cnn = Conexion::getConexion();
        try {
            $query = $cnn->prepare("INSERT INTO cliente VALUES (?, ?, ?, ?, ?)");
            $query->bindParam(1, $clienteDto->getIdCliente());
            $query->bindParam(2, $clienteDto->getNombre());
            $query->bindParam(3, $clienteDto->getApellido());
            $query->bindParam(4, $clienteDto->getCorreo());
            $query->bindParam(5, $clienteDto->getTelefono());
            $query->execute();
            $mensaje = "Registro creado exitosamente.";
        } catch (Exception $ex) {
            $mensaje = "Error: " . $ex->getMessage() . ".";
        }
        $cnn = null;
        return $mensaje;
    }

    function modificar(ClienteDto $clienteDto)
    {
        $cnn = Conexion::getConexion();
        try {
            $query = $cnn->prepare("UPDATE cliente SET idCliente = ?, nombre = ?, apellido = ?, correo = ?, telefono = ? WHERE idCliente = ?");
            $query->bindParam(1, $clienteDto->getIdCliente());
            //$query->bindParam(1, $clienteDto->getDocumento());
            $query->bindParam(2, $clienteDto->getNombre());
            $query->bindParam(3, $clienteDto->getApellido());
            $query->bindParam(4, $clienteDto->getCorreo());
            $query->bindParam(5, $clienteDto->getTelefono());
            $query->bindParam(6, $clienteDto->getIdCliente());
            // Si cambia el documento, el ultimo id cliente no reconocerá cual es el id cliente anterior a cambiar
            $query->execute();
            $mensaje = "Registro modificado exitosamente.";
        } catch (Exception $ex) {
            $mensaje = "Error: " . $ex->getMessage() . ".";
        }
        $cnn = null;
        return $mensaje;
    }
}
