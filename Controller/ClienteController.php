<?php

require "../Model/dto/ClienteDto.php";
require "../Model/dao/ClienteDao.php";

function registrarCliente(ClienteDto $clienteDto)
{
    $clienteDao = new ClienteDao();
    $clienteDao->registrar($clienteDto);
    //header("Location:../index.php?msg=$msg");
}

function modificarCliente(ClienteDto $clienteDto)
{
    $clienteDao = new ClienteDao();
    $clienteDao->modificar($clienteDto);
    //header("Location:../index.php?msg=$msg");
}

function eliminarCliente()
{
    $clienteDao = new ClienteDao();
    $msg = $clienteDao->eliminar($_GET["eliminar"]);
    header("Location:../index.php?msg=$msg");
}
