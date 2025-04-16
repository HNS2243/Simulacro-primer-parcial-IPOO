<?php

class Moto {
    private int    $codigo;
    private int    $costo;
    private int    $anio;
    private string $descripcion;
    private int    $porcentaje;
    private bool   $estado;

public function __construct($code, $cost, $year, $description, $percentage, $state){
    $this->codigo = $code;
    $this->costo = $cost;
    $this->anio = $year;
    $this->descripcion = $description;
    $this->porcentaje = $percentage;
    $this->estado = $state;
}

//Metodos GET
public function getCodigo() {
    return $this->codigo;
}

public function getCosto() {
    return $this->costo;
}

public function getAnio() {
    return $this->anio;
}

public function getDescripcion() {
    return $this->descripcion;
}

public function getPorcentaje() {
    return $this->porcentaje;
}

public function getEstadoM() {
    return $this->estado;
}

// Metodos Set
public function setCodigo($codigo) {
    $this->codigo = $codigo;
}

public function setCosto($costo) {
    $this->costo = $costo;
}

public function setAnio($anio) {
    $this->anio = $anio;
}

public function setDescripcion($descripcion) {
    $this->descripcion = $descripcion;
}

public function setPorcentaje($porcentaje) {
    $this->porcentaje = $porcentaje;
}

public function setEstado($estado) {
    $this->estado = $estado;
}

public function __toString() {
    return "Código: " . $this->codigo .
           ", Costo: $" . $this->costo .
           ", Año: " . $this->anio .
           ", Descripción: " . $this->descripcion .
           ", Porcentaje: " . $this->porcentaje . "%" .
           ", Estado: " . ($this->estado ? "Activa" : "Inactiva") . "\n" ; //El if más simplificado y al parecer lo puedo meter por aca 
}

public function darPrecioVenta() {
    if ($this->getEstadoM() == false){
        $_venta = -1 ;   //No entiendo muy bien, pero asumo que eso es <0
        return $_venta;
    } else {
        $anioActual = date("Y");
        $_compra = $this->getCosto();
        $_anio = $anioActual - $this->getAnio();
        $por_inc_anual = $this->getPorcentaje(); 
        $_venta = $_compra + $_compra * ($_anio * $por_inc_anual);
        return $_venta;
    }
}
}
?>