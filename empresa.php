<?php

class empresa {

    private string $denominacion;
    private string $direccion;
    private array  $clientes;
    private array  $motos;
    private array  $ventas;
    private int    $contadorVentas;

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
    foreach ($this->motos as $bikes){
        if($bikes->getCodigo() == $codigoMoto){
            return $bikes;
        }
        return null; // para asegurar que no hay retorno.. no se, capaz lo saque.
    }
} 
 
/* Implementar el método registrarVenta($colCodigosMoto, $objCliente) método que recibe por
parámetro una colección de códigos de motos, la cual es recorrida, y por cada elemento de la colección
se busca el objeto moto correspondiente al código y se incorpora a la colección de motos de la instancia
Venta que debe ser creada. Recordar que no todos los clientes ni todas las motos, están disponibles
para registrar una venta en un momento determinado.
El método debe setear los variables instancias de venta que corresponda y retornar el importe final de la
venta. */
public function registrarVenta($colCodigosMoto, $objCliente){
    //asi, busca insdiscriminadamete y agrega
    //primero, ver si el cliente esta activo
    if ($objCliente->getEstado()) {
        $fechaActual = new DateTime();
    foreach ($colCodigoMoto as $code){
        foreach ($this->motos as $bike){
            if ($bike->getCodigo() == $code && $bike->getEstadoM()) {
                $bikes[] = $bike; 
                $this->contadorVentas++; 
                foreach ($bikes as $precioU){
                    $preciosJ[] = $precioU->darPrecioVenta();
                    $precioF = array_sum($preciosJ);
                }
            }
        }
    }
    return $venta = new venta ($this->contadorVentas, $fechaActual, $objCliente, $bikes, $precioF ) ;
    //por el momento esta sin testear, creo que es asi, por lo menos entiendo la logica.
   }
}

/* Implementar el método retornarVentasXCliente($tipo,$numDoc) que recibe por parámetro el tipo y
número de documento de un Cliente y retorna una colección con las ventas realizadas al cliente. */

public function retornarVentasXCliente($tipo,$numDoc){
 //No tengo idea cuando se suponia que tenia que guardar que se hace una venta...     
}

}