<?php
//cript de testeo, se va a complicar todo esto..
include "cliente.php";
include    "moto.php";
include   "venta.php";
include "empresa.php";

//Objetos clientes:
$objCliente1 = new Cliente ("Rene", "Favaloro", true, 2311189, "DNI");
$objCliente2 = new Cliente ("Horacio", "Larreta", true, 17692128, "DNI" );

$colClientes = [$objCliente1, $objCliente2];

//Objetos Motos:
$objMoto1 = new Moto (11, 2230000, 2022, "Benelli Imperiale 400",        85, true);
$objMoto2 = new Moto (12, 584000,  2021, "Zanella Zr 150 Ohc",           70, true);
$objMoto3 = new Moto (13, 999900,  2023, "Zanella Patagonian Eagle 250", 55, false);

$colMotos = [$objMoto1, $objMoto2, $objMoto3];

//Objeto Empresa:

$ventas = [];
$empresa = new Empresa ("Alta Gama", "Av. Argentina 123", $colClientes, $colMotos, $ventas);

$colCodigosMoto1 = [11, 12, 13];
$venta1 = $empresa->registrarVenta($colCodigosMoto1, $colClientes[1]);
if ($venta1 == null){
    $venta1 = "No es posible";
}

print "La primer venta es tal que: \n". $venta1 . "\n";

$colCodigosMoto2 = [0];
$venta2 = $empresa->registrarVenta($colCodigosMoto2, $colClientes[1]);
if ($venta2 == null){
    $venta2 = "No es posible \n";
}
print "La segunda venta es tal que: \n" . $venta2 . "\n";


$colCodigosMoto3 = [2];
$venta3 = $empresa->registrarVenta($colCodigosMoto3, $colClientes[1]);
if ($venta3 == null){
    $venta3 = "No es posible \n";
}
print "La tercer venta es tal que: \n" . $venta3 . "\n";


$colVentas1 =  $empresa->retornarVentasXCliente("DNI",17692128);
if ($colVentas1 !==null){
foreach ($colVentas1 as $venta){
    echo $venta;
    }
} else {
    echo "Sin ventas \n";
}

$colVentas2 = $empresa->retornarVentasXCliente("DNI", 2311189 );
if ($colVentas2 !==null){
    foreach ($colVentas2 as $venta){
        echo $venta;
        }
    } else {
        echo "Sin ventas \n";
    }

echo $empresa;



?>