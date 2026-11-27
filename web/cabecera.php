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
    $ruta=RUTABASE."/scripts/clases/";
    $fichero=$ruta."$clase.php";
    
    if (file_exists($fichero))
        {
            require_once($fichero);
        }
      else
        {
            $ruta = RUTABASE."/aplicacion/clases/";
            $fichero = $ruta."$clase.php";

            if(file_exists($fichero))
            {
                require_once($fichero);
            }
            else
            {
                throw new Exception("La clase $clase no se ha encontrado.");
            }
        }
});

/* Inicio la sesión necesaria */
session_start();

include(RUTABASE."/aplicacion/plantilla/plantilla.php");
include(RUTABASE."/scripts/librerias/funcionesVarias.php");
include(RUTABASE."/scripts/librerias/funcionesRelacion8.php");

//creo todos los objetos que necesita mi aplicación

/* ====== CONSTANTES DE COLORES ====== */
const COLORESTEXTO = [
    "black" => ["nombre"=>"negro"],
    "white" => ["nombre"=>"blanco"],
    "yellow" => ["nombre"=>"amarillo"],
    "blue" => ["nombre"=>"azul"],
    "red" => ["nombre"=>"rojo"],
    "green" => ["nombre"=>"verde"]
];

const COLORESFONDO = [
    "black" => ["nombre"=>"negro"],
    "white" => ["nombre"=>"blanco"],
    "yellow" => ["nombre"=>"amarillo"],
    "blue" => ["nombre"=>"azul"],
    "red" => ["nombre"=>"rojo"],
    "green" => ["nombre"=>"verde"]
];

/* Creo los accesos */
$acl = new ACLArray();
$acceso = new Acceso();

/* Añadir role */
$acl->anadirRole("normal", [1=>true]);
$acl->anadirUsuario("Juan Gerardo Díaz Hurtado", "jdiahur", "1234", $acl->getCodRole("normal"));