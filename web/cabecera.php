<?php 

include_once(dirname(__FILE__) . "/scripts/librerias/validacion.php");
date_default_timezone_set('Europe/Madrid'); // Configurar la zona horaria

define("RUTABASE", dirname(__FILE__));
//define("MODO_TRABAJO","produccion"); //en "produccion o en desarrollo
define("MODO_TRABAJO","desarrollo"); //en "produccion o en desarrollo

if (MODO_TRABAJO=="produccion")
    error_reporting(0);
    else 
        error_reporting(E_ALL);  

spl_autoload_register(function ($clase){
    $ruta=RUTABASE."/aplicacion/clases/curso2026/";
    $fichero=$ruta."$clase.php";
    
    if (file_exists($fichero))
        {
            require_once($fichero);
        }
      else
        {
            throw new Exception("La clase $clase no se ha encontrado.");
        }
});

include(RUTABASE."/aplicacion/plantilla/plantilla.php");

//creo todos los objetos que necesita mi aplicación
$muebles = [];

$muebles[1] = new MuebleReciclado(
    "Silla Nórdica Eco",
    "EcoWood",
    "ESPAÑA",
    2022,
    "15/03/2022",
    "31/12/2035",
    65.50,
    85,
    20
);
$muebles[1]->anadirCaracteristicas("color", "verde oliva", "material", "plástico reciclado", "apilable", true);

$muebles[2] = new MuebleTradicional(
    "Mesa Comedor Roble",
    "ArtesanosSur",
    "ESPAÑA",
    2021,
    "10/06/2021",
    "31/12/2040",
    320.00,
    55.5,
    "S01",
    15
);
$muebles[2]->anadirCaracteristicas("madera", "roble macizo", "plazas", 6, "barniz", "mate");

$muebles[3] = new MuebleReciclado(
    "Estantería Modular",
    "ReMueble",
    "PORTUGAL",
    2023,
    "01/02/2023",
    "31/12/2038",
    110.00,
    70
);
$muebles[3]->anadirCaracteristicas("baldas", 5, "color", "gris antracita");

$muebles[4] = new MuebleTradicional(
    "Cómoda Clásica",
    "MaderaFina",
    "ITALIA",
    2020,
    "20/09/2020",
    "31/12/2036",
    245.90,
    42.0,
    "S04",
    20
);
$muebles[4]->anadirCaracteristicas("cajones", 4, "tiradores", "latón envejecido", "estilo", "rústico");

$muebles[5] = new MuebleReciclado(
    "Mesa Centro Palets",
    "GreenHome",
    "FRANCIA",
    2024,
    "12/04/2024",
    "31/12/2040",
    89.95,
    95
);
$muebles[5]->anadirCaracteristicas("ruedas", true, "tratamiento", "ignífugo", "largo_cm", 110);

$muebles[6] = new MuebleTradicional(
    "Armario Ropero",
    "CarpinteríaNorte",
    "ESPAÑA",
    2022,
    "05/11/2022",
    "31/12/2040",
    490.00,
    98.5,
    "S12",
    5
);
$muebles[6]->anadirCaracteristicas("puertas", 3, "espejo", true, "madera", "pino");