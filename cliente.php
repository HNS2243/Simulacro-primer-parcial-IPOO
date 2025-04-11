<?php
// Mejor un archivo por clase
class cliente {
    /*Se asume que todos los datos ingresados dados con suma prudencia y siempre son exactos*/
    private string  $nombre;
    private string  $apellido;
    private bool    $estado;
    private int     $documento;
    private string  $tipoDoc;

    // Constructor
    public function __construct(string $name, string $surname, string $state, int $document, string $tipeDoc) {
        $this->nombre    = $name;
        $this->apellido  = $surname;
        $this->estado    = $state;
        $this->documento = $document;
        $this->$tipoDoc  = $tipeDoc;
    }

    // Métodos getter
    public function getNombre(): string {
        return $this->nombre;
    }

    public function getApellido(): string {
        return $this->apellido;
    }

    public function getEstado(): string {
        return $this->estado;
    }

    public function getDocumento(): int {
        return $this->documento;
    }

    public function getTipoDoc(){
        return $this->tipoDoc;
    }

    // Método toString
    public function __toString(): string {
        return "Nombre: " . $this->nombre . " " . $this->apellido . 
               ", Documento: " . $this->tipoDoc . 
               ", Número: " . $this->documento . 
               ", Estado de cuenta: " . $this->estado;
    }

    public function setNombre(string $nombre): void {
        $this->nombre = $nombre;
    }
    
    public function setApellido(string $apellido): void {
        $this->apellido = $apellido;
    }
    
    public function setEstado(string $estado): void {
        $this->estado = $estado;
    }
    
    public function setDocumento(int $documento): void {
        $this->documento = $documento;
    }
    
    public function setTipoDoc(string $tipoDoc): void {
        $this->tipoDoc = $tipoDoc;
    }
}
