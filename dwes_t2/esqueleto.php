<?php

include 'articulo.php'; // Ingresamos el archivo de "articulo.php"
include 'bebida.php'; // Ingresamos el archivo de "bebida.php"
include 'pizza.php'; // Ingresamos el archivo de "pizza.php"

class Pedido {
    private $pizzas;
    private $bebidas;
    private $otros;

    public function __construct() {
        $this->pizzas = [];
        $this->bebidas = [];
        $this->otros = [];
    }

    public function agregarPizza($nombre, $coste, $precio, $contador, $ingredientes) {
        if (!isset($this->pizzas[$nombre])) {
            $this->pizzas[$nombre] = [
                'coste' => $coste,
                'precio' => $precio,
                'contador' => $contador,
                'ingredientes' => $ingredientes,
            ];
        } 
    }

    public function agregarBebida($nombre, $coste, $precio, $contador, $alcoholica) {
        if (!isset($this->bebidas[$nombre])) {
            $this->bebidas[$nombre] = [
                'coste' => $coste,
                'precio' => $precio,
                'contador' => $contador,
                'alcoholica' => $alcoholica,
            ];
        }
    }

    public function agregarOtros($nombre, $coste, $precio, $contador) {
        if (!isset($this->otros[$nombre])) {
            $this->otros[$nombre] = [
                'coste' => $coste,
                'precio' => $precio,
                'contador' => $contador,
            ];
        }
    }

    public function getPizzas() {
        return $this->pizzas;
    }

    public function getBebidas() {
        return $this->bebidas;
    }

    public function getOtros() {
        return $this->otros;
    }
}

$pedido = new Pedido();

// Inicialización de los artículos
$articulos = [
    $pedido->agregarPizza("Pizza Margarita", 4.00, 8.00, 30, ["Tomate", "Mozzarella", "Albahaca"]),
    $pedido->agregarPizza("Pizza Pepperoni", 5.00, 10.00, 25, ["Tomate", "Mozzarella", "Pepperoni"]),
    $pedido->agregarPizza("Pizza Vegetal", 4.50, 9.00, 18, ["Tomate", "Mozzarella", "Verduras Variadas"]),
    $pedido->agregarPizza("Pizza 4 quesos", 5.50, 11.00, 20, ["Mozzarella", "Gorgonzola", "Parmesano", "Fontina"]),
    $pedido->agregarBebida("Refresco", 1.00, 2.00, 50, false),
    $pedido->agregarBebida("Cerveza", 1.50, 3.00, 40, true),
    $pedido->agregarOtros("Lasagna", 3.50, 7.00, 20),
    $pedido->agregarOtros("Pan de ajo y mozzarella", 2.00, 4.50, 15)
];

// Ejemplo de uso
mostrarMenu($pedido);
mostrarMasVendidos($pedido);
mostrarMasLucrativos($pedido);

function mostrarMenu($pedido) {
    echo "<h1>Nuestro menú</h1>";

    echo "<h2>Pizzas</h2>";
    foreach ($pedido->getPizzas() as $pizza => $detalles) {
        echo "$pizza {$detalles['precio']} €";
        echo "</br>";
    }

    echo "<h2>Bebidas</h2>";
    foreach ($pedido->getBebidas() as $bebida => $detalles) {
        echo "$bebida {$detalles['precio']} €";
        echo "</br>";
    }

    echo "<h2>Otros</h2>";
    foreach ($pedido->getOtros() as $otro => $detalles) {
        echo "$otro {$detalles['precio']} €";
        echo "</br>";
    }
}

function mostrarMasVendidos($pedido) {
    echo "<h1>Los más vendidos</h1>";

    $pizzas = $pedido->getPizzas();
    $bebidas = $pedido->getBebidas();

    $articulos = array_merge($pizzas, $bebidas);
    arsort($articulos);

    foreach ($articulos as $nombre => $detalles) {
        echo "$nombre: Vendidas {$detalles['contador']} unidades";
        echo "<br>";
    }
}

function mostrarMasLucrativos($pedido) {
    echo "<h1>¡Los más lucrativos!</h1>";

    $pizzas = $pedido->getPizzas();
    $bebidas = $pedido->getBebidas();
    $otros = $pedido->getOtros();

    $articulos = array_merge($pizzas, $bebidas, $otros);

    $beneficios = [];
    foreach ($articulos as $nombre => $detalles) {
        $beneficios[$nombre] = ($detalles['precio'] - $detalles['coste']) * $detalles['contador'];
    }
    
    arsort($beneficios);

    foreach ($beneficios as $nombre => $beneficio) {
        echo "$nombre: Beneficio €$beneficio";
        echo "<br>";
    }
}

?>