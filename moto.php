<?php
/*
En la clase Moto:
1. Se registra la siguiente información: código, costo, año fabricación, descripción, porcentaje
incremento anual, activa (atributo que va a contener un valor true, si la moto está disponible para la
venta y false en caso contrario).
2.
 Método constructor que recibe como parámetros los valores iniciales para los atributos definidos en la
clase.
3.
 Los métodos de acceso de cada uno de los atributos de la clase.
4.
 Redefinir el método toString para que retorne la información de los atributos de la clase.
5.
 Implementar el método darPrecioVenta el cual calcula el valor por el cual puede ser vendida una moto.
Si la moto no se encuentra disponible para la venta retorna un valor < 0. Si la moto está disponible para
la venta, el método realiza el siguiente cálculo:
$_venta = $_compra + $_compra * (anio * por_inc_anual)
donde $_compra: es el costo de la moto.
anio: cantidad de años transcurridos desde que se fabricó la moto.
por_inc_anual: porcentaje de incremento anual de la moto.

*/
class moto {
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
    $this->descripcion = $descripcion;
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
           ", Estado: " . ($this->estado ? "Activa" : "Inactiva"); //El if más simplificado y al parecer lo puedo meter por aca 
}

public function darPrecioVenta() {
    if ($this->getEstado == false){
        $_venta -1 ;   //No entiendo muy bien, pero asumo que eso es <0
        return $_venta;
    } else {
        $anioActual = date("Y");
        $_compra = $this->getCosto;
        $_anio = $anioActual - $this->getAnio;
        $por_inc_anual = $this->getPorcentaje; 
        $_venta = $_compra + $_compra * ($_anio * $por_inc_anual);
        return $_venta;
    }
}
}
