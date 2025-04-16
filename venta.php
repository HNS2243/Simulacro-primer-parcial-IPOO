<?php

class Venta {
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

public function incorporarMoto($objMoto) {
    // Verifica si la moto está disponible para la venta
    $precioVenta = $objMoto->darPrecioVenta();

    if ($precioVenta > 0) {
        // Se puede vender porque si esta disponible, darPrecioVenta va a dar un precio, sino da -1 entonces agregamos la moto
        $this->motos[] = $objMoto;

        // Sumamos el precio de la moto al precio final de la venta. Tiene que ser con set
       // $this->precioFinal += $precioVenta; Eso esta mal
       $temPrecio = $this->getPrecioFinal() + $precioVenta;
       $this->setPrecioFinal($tempPrecio);
        $incorporacion = "Exitosa" ;
        return $incorporacion; // incorporación exitosa
    } else {
        $incorporacion = "No posible" ;
        return $incorporacion; // no se puede incorporar
    }  //Los retornos son para una formalidad creo
}
}
?>