<?php

class Empresa {

    private string $denominacion;
    private string $direccion;
    private array  $clientes;
    private array  $motos;
    private array  $ventas;
    private int    $contadorVentas = 0;
    private array  $coleccionVentas;

public function __construct($denomination, $address, $custumers, $motorcycles, $sales){
    $this->denominacion = $denomination;
    $this->direccion    = $address;
    $this->clientes     = $custumers;
    $this->motos        = $motorcycles;
    $this->ventas       = $sales;
}

//Metodos Get
public function getDenominacion() {
    return $this->denominacion;
}

public function getDireccion() {
    return $this->direccion;
}

public function getClientes() {
    return $this->clientes;
}

public function getMotos() {
    return $this->motos;
}

public function getVentas() {
    return $this->ventas;
}

private function getContadorVentas(){
    return $this->contadorVentas;
}

//Metodos Set

public function setDenominacion($denominacion): void {
    $this->denominacion = $denominacion;
}

public function setDireccion($direccion): void {
    $this->direccion = $direccion;
}

public function setClientes($clientes): void {
    $this->clientes = $clientes;
}

public function setMotos($motos): void {
    $this->motos = $motos;
}

public function setVentas($ventas): void {
    $this->ventas = $ventas;
}

//Metodo to string. Provablemente se haga un dato muy grande.. 

public function __toString() {
    return "Denominación: " . $this->denominacion .
           ", Dirección: " . $this->direccion .
           ", Clientes: " . count($this->clientes) .
           ", Motos: " . count($this->motos) .
           ", Ventas: " . count($this->ventas);
}

/*Implementar el método retornarMoto($codigoMoto) que recorre la 
colección de motos de la Empresa y
retorna la referencia al objeto moto cuyo código coincide con el
 recibido por parámetro. */
public function retornarMoto($codigoMoto){ 
    $motocicleta = null;
    $i = 0;

    $colMotosTemp = $this->getMotos();

    while($i < count($colMotosTemp) && $motocicleta === null){
        if($colMotosTemp[$i]->getCodigo() === $codigoMoto){
             $motocicleta =$colMotosTemp[$i];
        } else { 
            $i++;
        }
    } 
    return $motocicleta;
}

public function registrarVenta($colCodigosMoto, $objCliente){
    
   
    //primero, ver si el cliente esta activo
    if ($objCliente->getEstado()) {
        $fechaActual = new DateTime(); //toma fecha del momento

    foreach ($colCodigosMoto as $code){  //recorre todo el el array coleccion de motos y saca cada codigo que tiene
        $moto = $this->retornarMoto($code);

        if ($moto !== null && $moto->getEstadoM()) {
            $bikes[] = $moto;
            $preciosJ[] = $moto->darPrecioVenta();
        }
    }

    if (!empty($bikes)) {
        $this->contadorVentas++;
        $precioF = array_sum($preciosJ);
        $numVentas = $this->getContadorVentas();
        $venta = new Venta($numVentas, $fechaActual, $objCliente, $bikes, $precioF);
        $this->coleccionVentas[] = $venta;
        return $venta;
    }
} else {
return null; // No se registró ninguna venta
}
}

public function retornarVentasXCliente($tipo,$numDoc){

$cliente = null;
$i = 0;
$sales = [];
while($i < count($this->clientes) && $cliente === null){
    if($this->clientes[$i]->getDocumento() == $numDoc && $this->clientes[$i]->getTipoDoc() === $tipo ){
        $cliente = $this->clientes[$i];
    } else { 
        $i++;
    }
}
if ($cliente == null){
    return null;
} 
foreach ($this->coleccionVentas as $venta) {
    if($venta->getCliente() === $cliente){
        $sales[] = $venta;
    }
}
return empty($sales) ? null : $sales;
    }
}
?>