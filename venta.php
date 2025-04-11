<?php
/*
En la clase Venta:
1. Se registra la siguiente información: número, fecha, referencia al cliente, referencia a una colección de
motos y el precio final.
2. Método constructor que recibe como parámetros cada uno de los valores a ser asignados a cada
atributo de la clase.
3. Los métodos de acceso de cada uno de los atributos de la clase.
4. Redefinir el método _toString para que retorne la información de los atributos de la clase.

*/
class venta {
    private int      $numero;
    private DateTime $fecha;
    private cliente  $cliente;
    private array    $motos;
    private int      $precioFinal;

public function __construct($num, $date, $client, $bikes, $finalPrice){
    $this->numero     = $num;
    $this->fecha      = $date;
    $this->cliente    = $client;
    $this->motos       = $bikes;
    $this->precioFinal = $finalPrice;
}

//funciones Get
public function getNumero() {
    return $this->numero;
}

public function getFecha() {
    return $this->fecha;
}

public function getCliente() {
    return $this->cliente;
}

public function getMotos() {
    return $this->motos;
}

public function getPrecioFinal() {
    return $this->precioFinal;
}

// funciones SET  (vamos a repetir nombres porque ya no se que poner)
public function setNumero($numero) {
    $this->numero = $numero;
}

public function setFecha($fecha) {
    $this->fecha = $fecha;
}

public function setCliente($cliente) {
    $this->cliente = $cliente;
}

public function setMotos($motos) {
    $this->motos = $motos;
}

public function setPrecioFinal($precioFinal) {
    $this->precioFinal = $precioFinal;
}

//el metodo string
//La verdad, no se como quedaria la salida (en formato) asi que no se que va a pasar hasta pasarlo por una prueva 
public function __toString() {
    $infoMotos = "";
    foreach ($this->motos as $moto) {
        $infoMotos .= $moto . "\n"; // hace uso del metodo string de moto 
    }

    return "Venta N°: " . $this->numero . "\n" .
           "Fecha: " . $this->fecha->format('Y-m-d') . "\n" .
           "Cliente:\n" . $this->cliente . "\n" . // hace uso del metodo string del cliente
           "Motos:\n" . $infoMotos .
           "Precio Final: $" . $this->precioFinal . "\n";
}

/* 5. Implementar el método incorporarMoto($objMoto) que recibe por parámetro un objeto moto y lo
incorpora a la colección de motos de la venta, siempre y cuando sea posible la venta. El método cada
vez que incorpora una moto a la venta, debe actualizar la variable instancia precio final de la venta.
Utilizar el método que calcula el precio de venta de la moto donde crea necesario. */

//Esto hay que verlo bien

public function incorporarMoto($objMoto) {
    // Verifica si la moto está disponible para la venta
    $precioVenta = $objMoto->darPrecioVenta();

    if ($precioVenta > 0) {
        // Se puede vender porque si esta disponible, darPrecioVenta va a dar un precio, sino da -1 entonces agregamos la moto
        $this->motos[] = $objMoto;

        // Sumamos el precio de la moto al precio final de la venta
        $this->precioFinal += $precioVenta;
        $incorporacion = "Exitosa" ;
        return $incorporacion; // incorporación exitosa
    } else {
        $incorporacion = "No podible" ;
        return $incorporacion; // no se puede incorporar
    }  //Los retornos son para una formalidad creo
}




}