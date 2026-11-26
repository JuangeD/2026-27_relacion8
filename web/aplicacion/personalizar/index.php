<?php
include_once(dirname(__FILE__) . "/../../cabecera.php");
//controlador
$barra=[
    [
        "TEXTO"=>"inicio",
        "ENLACE"=>"/index.php"
    ],
    [
        "TEXTO"=>"visualización colores"
    ]
];

/* ====== CONTADOR VISITAS ====== */
$visitas = setCookieVisitas();

/* ====== ESTILOS POR DEFECTO ====== */
$estilos = setCookiesColores();

//dibuja la plantilla de la vista
inicioCabecera("visualizacion colores");
cabecera($estilos);
finCabecera();
inicioCuerpo("VISUALIZACIÓN COLORES", $barra);
cuerpo($visitas);  //llamo a la vista
finCuerpo();
// **********************************************************

//vista
function cabecera(array $estilos) 
{
    ?>
    <style>
        #documento {
            color: <?php echo $estilos["texto"] ?>;
            background-color: <?php echo $estilos["fondo"] ?>;
        }
    </style>
    <?php
}

//vista
function cuerpo(int $visitas)
{
?>
    <br><br>
    <h2>Visitas del usuario a esta página: <?php echo $visitas ?></h2>
    <p>En esta página se pueden visualizar los estilos aplicados</p>
<?php
}

