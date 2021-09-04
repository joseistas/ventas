<?php
    class ProductoDto
    {
        private $idProducto;
        private $imagen;
        private $nombre;
        private $descripcion;
        private $cantidad; 
        private $precio;
        private UsuarioDto $idUsuarioCreacion;

        function getIdProducto(){
            return $this->idProducto;
        }

        function setIdProducto($idProducto){
            $this->idProducto = $idProducto;
        }

        function getImagen(){
            return $this->imagen;
        }

        function setImagen($imagen){
            $this->imagen = $imagen;
        }

        function getNombre(){
            return $this->nombre;
        }

        function setNombre($nombre){
            $this->nombre = $nombre;
        }

        function getDescripcion(){
            return $this->descripcion;
        }

        function setDescripcion($descripcion){
            $this->descripcion = $descripcion;
        }

        function getCantidad(){
            return $this->cantidad;
        }

        function setCantidad($cantidad){
            $this->cantidad = $cantidad;
        }

        function getPrecio(){
            return $this->precio;
        }

        function setPrecio($precio){
            $this->precio = $precio;
        }

        function getIdUsuarioCreacion(){
            return $this->idUsuarioCreacion;
        }

        function setIdUsuarioCreacion($idUsuarioCreacion){
            $this->idUsuarioCreacion = $idUsuarioCreacion;
        }
    }
?>