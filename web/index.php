<?php
include_once(dirname(__FILE__) . "/cabecera.php");
//controlador
$barra=[
    [
        "TEXTO"=>"inicio",
        "ENLACE"=>"/index.php"
    ],
    [
        "TEXTO"=>"index"
    ]
];

//dibuja la plantilla de la vista
inicioCabecera("relacion 8");
cabecera();
finCabecera();
inicioCuerpo("RELACIÓN 8", $barra);
cuerpo();  //llamo a la vista
finCuerpo();
// **********************************************************

//vista
function cabecera() 
{
    ?>
    <!--Esto va en el head-->
    <?php
}

//vista
function cuerpo()
{
?>
    <br><br>
<?php
}

