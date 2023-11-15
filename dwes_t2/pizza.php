<?php

    // Creamos la clase "Pizza" y hacemos un constructor
    class Pizza extends Articulo {
        private $ingredientes;
    
        public function __construct($nombre, $coste, $precio, $contador, $ingredientes) {
            parent::__construct($nombre, $coste, $precio, $contador);
            $this->ingredientes = $ingredientes;
        }

        public function __toString() {
            return "Nombre: {$this->nombre}, Coste: {$this->coste}, Precio: {$this->precio}, Contador: {$this->contador}, Ingrdientes: {$this->ingredintes}";
        }
    }

?>