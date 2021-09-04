<?php

require "../Core/conexion.php";
require "../Model/dto/ClienteDto.php";
require "../Model/dao/ClienteDao.php";

if (isset($_POST["registrar"])) {
    registrar();
} else if (isset($_POST["modificar"])) {
    modificar();
} else if (isset($_GET["eliminar"])) {
    eliminar();
}

function registrar()
{
    $clienteDto = new ClienteDto();
    $clienteDao = new ClienteDao();

    $clienteDto->setIdCliente($_POST["idCliente"]);
    $clienteDto->setNombre($_POST["nombre"]);
    $clienteDto->setApellido($_POST["apellido"]);
    $clienteDto->setCorreo($_POST["correo"]);
    $clienteDto->setTelefono($_POST["telefono"]);

    $msg = $clienteDao->registrar($clienteDto);
    header("Location:../index.php?msg=$msg");
}

function modificar()
{
    $clienteDto = new ClienteDto();
    $clienteDao = new ClienteDao();

    $clienteDto->setIdCliente($_POST["idCliente"]);
    $clienteDto->setNombre($_POST["nombre"]);
    $clienteDto->setApellido($_POST["apellido"]);
    $clienteDto->setCorreo($_POST["correo"]);
    $clienteDto->setTelefono($_POST["telefono"]);

    $msg = $clienteDao->modificar($clienteDto);
    header("Location:../index.php?msg=$msg");
}

function eliminar()
{
    $clienteDao = new ClienteDao();
    $msg = $clienteDao->eliminar($_GET["eliminar"]);
    header("Location:../index.php?msg=$msg");
}
