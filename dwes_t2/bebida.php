<?php

    // Creamos la clase "Bebida" y hacemos un constructor
    class Bebida extends Articulo {
        private $alcoholica;
    
        public function __construct($nombre, $coste, $precio, $contador, $alcoholica) {
            parent::__construct($nombre, $coste, $precio, $contador);
            $this->alcoholica = false;
        }

        // ToString
        public function __toString() {
            return "Nombre: {$this->nombre}, Coste: {$this->coste}, Precio: {$this->precio}, Contador: {$this->contador} Alcoholica: " . ($this->alcoholica ? 'Sí' : 'No');
        }
    }

?>