<?php

include_once(dirname(__FILE__) . "/../../cabecera.php");

// Controlador
$acceso->quitarRegistroUsuario();

header("Location: /aplicacion/acceso/login.php");