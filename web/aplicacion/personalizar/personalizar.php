<?php
include_once(dirname(__FILE__) . "/../../cabecera.php");
//controlador
$barra=[
    [
        "TEXTO"=>"inicio",
        "ENLACE"=>"/index.php"
    ],
    [
        "TEXTO"=>"personalizar"
    ]
];

/* Estilos de la página */
$estilos = setCookiesColores();

/* Validación de cambio de estilos */
if(isset($_POST["guardarCambios"]))
{
    /* Valido el color del texto */
    if(isset($_POST["color-texto"]))
        if(validaRango($_POST["color-texto"], COLORESTEXTO, 2))
        {
            $estilos["texto"]=$_POST["color-texto"];
            generarCookie("texto", $_POST["color-texto"], expiracionCookie(), "/aplicacion/personalizar");
        }
            

    /* Valido el color de fondo */
    if(isset($_POST["color-fondo"]))
        if(validaRango($_POST["color-fondo"], COLORESFONDO, 2))
        {
            $estilos["fondo"]=$_POST["color-fondo"];
            generarCookie("fondo", $_POST["color-fondo"], expiracionCookie(), "/aplicacion/personalizar");
        }
}

//dibuja la plantilla de la vista
inicioCabecera("personalizacion");
cabecera($estilos);
finCabecera();
inicioCuerpo("PERSONALIZACIÓN", $barra);
cuerpo($estilos);  //llamo a la vista
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
function cuerpo(array $estilos)
{
?>
    <br><br>

    
    <form action="#" method="post">

    <!-- Color del texto -->
    <h2>Color de texto</h2>
    <select name="color-texto" class="for_select">
        <?php 
            foreach(COLORESTEXTO as $key => $color)
            {
                echo "<option value='$key' ". (($key==$estilos["texto"])?"selected":"") .">". mb_strtoupper($color["nombre"]) ."</option>".PHP_EOL;
            }
        ?>
    </select>

    <!-- Color de fondo -->
    <h2>Color de fondo</h2>
    <select name="color-fondo" class="for_select">
        <?php 
            foreach(COLORESFONDO as $key => $color)
            {
                echo "<option value='$key' ". (($key==$estilos["fondo"])?"selected":"") .">". mb_strtoupper($color["nombre"]) ."</option>".PHP_EOL;
            }
        ?>
    </select>

    <!-- Botón de subida -->
    <br><br>
    <input type="submit" value="Guardar cambios" name="guardarCambios" class="boton">
    </form>
    
<?php
}