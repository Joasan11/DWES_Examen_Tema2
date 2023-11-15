<?php

    // Creamos la clase "Articulo" y hacemos un constructor
    class Articulo {
        private $nombre;
        private $coste;
        private $precio;
        private $contador;

        public function __construct($nombre, $coste, $precio, $contador) {
            $this->nombre = $nombre;
            $this->coste = $coste;
            $this->precio = $precio;
            $this->contador = $contador;
        }

        public function __toString() {
            return "Nombre: {$this->nombre}, Coste: {$this->coste}, Precio: {$this->precio}, Contador: {$this->contador}";
        }
    }

?>