<?php
include_once(dirname(__FILE__) . "/../../cabecera.php");

//controlador
$barra=[
    [
        "TEXTO"=>"inicio",
        "ENLACE"=>"/index.php"
    ],
    [
        "TEXTO"=>"pag. textos"
    ]
];

$textos = [];
$errores=[];

if(!isset($_SESSION["textos"]))
    $_SESSION["textos"]=$textos;
else
    $textos = $_SESSION["textos"];

/* ====== GUARDAR TEXTO ====== */
if(isset($_POST["guardar"]))
{
    if(isset($_POST["texto"]))
    {
        if($_POST["texto"]==="")
            $errores[]["texto"] = "El texto no puede estar vacío";


        if(empty($errores))
        {
            $textos[]=new RegistroTexto($_POST["texto"]);
            $_SESSION["textos"]=$textos;
        }       
    }
}

/* ====== LIMPIAR TEXTOS ====== */
if(isset($_POST["limpiar"]))
{
    $textos = [];
    $_SESSION["textos"] = $textos;
}

//dibuja la plantilla de la vista
inicioCabecera("pag. textos");
cabecera();
finCabecera();
inicioCuerpo("PAGINA TEXTOS", $barra);
cuerpo($textos);  //llamo a la vista
finCuerpo();
// **********************************************************

//vista
function cabecera() 
{
    ?>
    <?php
}

//vista
function cuerpo(array $textos)
{
?>
    <br><br>
    <form action="" method="post">
        <!-- Registro de texto -->
        <input type="text" name="texto" placeholder="Introduce un texto..." width="350px" height="auto">
        <input type="submit" value="Guardar" name="guardar" class="boton">

        <!-- Botón para limpiar los textos -->
        <input type="submit" value="Limpiar" name="limpiar" class="boton">
    </form>
    <hr>
    <textarea rows="15" cols="50" readonly><?php 
        
        if(!empty($textos))
        {
            foreach($textos as $text)
            {
                echo $text.PHP_EOL;
            }
        }
        
    ?></textarea>
<?php
}

