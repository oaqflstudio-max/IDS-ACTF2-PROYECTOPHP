<?php
/**
 * Actividad Formativa 2: Desarrollo de una Aplicación Simple en Línea
 * Clase: Producto
 * Descripción: Modela un producto para un sistema de gestión de inventario.
 */

class Producto {
    // Atributos de la clase
    private $id;
    private $nombre;
    private $precio;
    private $stock;

    /**
     * Constructor de la clase
     * Inicializa los atributos del producto al instanciarlo.
     */
    public function __construct($id, $nombre, $precio, $stock) {
        $this->id = $id;
        $this->nombre = $nombre;
        $this->precio = $precio;
        $this->stock = $stock;
    }

    // --- MÉTODOS DE LA CLASE ---

    /**
     * Muestra la información completa del producto en pantalla.
     */
    public function mostrarDetalles() {
        echo "<h3>Detalles del Producto:</h3>";
        echo "ID: " . $this->id . "<br>";
        echo "Nombre: " . $this->nombre . "<br>";
        echo "Precio: $" . number_format($this->precio, 2) . "<br>";
        echo "Stock Disponible: " . $this->stock . " unidades<br>";
        echo "---------------------------------------<br>";
    }

    /**
     * Actualiza el stock sumando la cantidad ingresada.
     */
    public function reabastecer($cantidad) {
        if ($cantidad > 0) {
            $this->stock += $cantidad;
            echo "<p><i>Se han añadido {$cantidad} unidades a '{$this->nombre}'.</i></p>";
        }
    }

    /**
     * Reduce el stock si hay disponibilidad suficiente para una venta.
     */
    public function vender($cantidad) {
        if ($cantidad <= $this->stock) {
            $this->stock -= $cantidad;
            echo "<p style='color: green;'>✔️ Venta exitosa: Se vendieron {$cantidad} unidades de '{$this->nombre}'.</p>";
        } else {
            echo "<p style='color: red;'>❌ Error: Stock insuficiente para vender {$cantidad} unidades de '{$this->nombre}'.</p>";
        }
    }
}

// =================================================================
// INSTANCIACIÓN DE OBJETOS Y PRUEBA DE MÉTODOS (Programa Principal)
// =================================================================

echo "<h2>--- Simulación del Sistema de Gestión de Productos ---</h2>";

// 1. Instanciación de objetos a partir de la clase Producto
$producto1 = new Producto(101, "Laptop Dell Inspiron", 15499.50, 10);
$producto2 = new Producto(102, "Mouse Inalámbrico", 350.00, 5);

// 2. Prueba de métodos con el Producto 1
$producto1->mostrarDetalles();
$producto1->vender(3); // Venta válida
$producto1->mostrarDetalles(); // Ver el cambio de stock

// 3. Prueba de métodos con el Producto 2
$producto2->mostrarDetalles();
$producto2->reabastecer(10); // Agregar stock
$producto2->vender(20); // Intento de venta mayor al stock (Debe dar error)
$producto2->mostrarDetalles();

?>