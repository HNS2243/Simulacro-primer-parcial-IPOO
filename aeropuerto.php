<?php 
class Aeropuerto {
    // Variables que maneja la clase
    private string $denominacion;
    private string $direccion;
    private array  $coleccionAerolineas; // array de objetos Aerolinea 

    // Constructor
    public function __construct(string $denominacion, string $direccion, array $coleccionAerolineas) {
        $this->setDenominacion($denominacion);
        $this->setDireccion($direccion);
        $this->setColeccionAerolineas($coleccionAerolineas);
    }

    // Setters
    public function setDenominacion($denominacion) {
        $this->denominacion = $denominacion;
    }

    public function setDireccion($direccion) {
        $this->direccion = $direccion;
    }

    public function setColeccionAerolineas($coleccionAerolineas) {
        $this->coleccionAerolineas = $coleccionAerolineas;
    }

    // Getters
    public function getDenominacion() {
        return $this->denominacion;
    }

    public function getDireccion() {
        return $this->direccion;
    }

    public function getColeccionAerolineas() {
        return $this->coleccionAerolineas;
    }

    public function __toString() {
        return "Los datos del aeropuerto son: \n" .
               " Denominación: " . $this->getDenominacion() . "\n" .
               " Dirección: " . $this->getDireccion() . "\n" .
               " Aerolíneas que arriban:\n" .
               implode("\n", array_map(function($aerolinea) { //implode lo encontre en la pag de php, no se como lo va quedar con la falta de toString de aerolineas
                   return "  - " . $aerolinea;
               }, $this->getColeccionAerolineas())) . "\n";
    }

    public function retornarVuelosAerolinea($aerolinea) {
        $vuAer = [];
    
        foreach ($this->getColeccionAerolineas() as $aerolineaC) {
   
            if ($aerolineaC == $aerolinea) {
                $vuAer= $aerolineaC->getColeccionVuelos();
            }
        }   
        return $vulosAer;
    }

    public function ventaAutomatica($asientos, $fecha, $destino) {

        foreach ($this->getColeccionAerolineas() as $aerolinea) { // recorre las erolineas
            $vuelos = $aerolinea->darVueloADestino($destino, $asientos); //empareja los vuelos
            foreach ($vuelos as $vuelo) { //recorre lo que encontro
                if ($vuelo->getFecha() >= $fecha) { //verificacion de detalles
                    if ($vuelo->getCantAsientosDisponibles() >= $asientos) {
                        $vuelo->asignarAsientosDisponibles($asientos);
                        return $vuelo; //retorna directamente el vuelo
                    }
                }
            }
        }
    }
}




