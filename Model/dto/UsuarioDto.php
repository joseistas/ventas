<?php
class UsuarioDto
{
    private $idUsuario;
    private $nombre;
    private $apellido;
    private $contrasena;
    private $rol;

    function getIdUsuario()
    {
        return $this->idUsuario;
    }

    function setIdUsuario($idUsuario)
    {
        $this->idUsuario = $idUsuario;
    }

    function getNombre()
    {
        return $this->nombre;
    }

    function setNombre($nombre)
    {
        $this->nombre = $nombre;
    }

    function getApellido()
    {
        return $this->apellido;
    }

    function setApellido($apellido)
    {
        $this->apellido = $apellido;
    }

    function getContrasena()
    {
        return $this->contrasena;
    }

    function setContrasena($contrasena)
    {
        $this->contrasena = $contrasena;
    }

    function getRol()
    {
        return $this->rol;
    }

    function setRol($rol)
    {
        $this->rol = $rol;
    }
}
?>