<?php
include_once(dirname(__FILE__) . "/../../cabecera.php");
//controlador
$barra=[
    [
        "TEXTO"=>"inicio",
        "ENLACE"=>"/index.php"
    ],
    [
        "TEXTO"=>"login"
    ]
];


//dibuja la plantilla de la vista
inicioCabecera("login");
cabecera();
finCabecera();
inicioCuerpo("LOGIN", $barra);
cuerpo();  //llamo a la vista
finCuerpo();
// **********************************************************

//vista
function cabecera() 
{
    ?>
    <?php
}

//vista
function cuerpo()
{
?>
    <br><br>
    <form action="" method="post">
        <!-- Login -->
        <label for="">Login:</label>
        <input type="text" name="login" autofocus>

        <!-- Contraseña -->
        <br>
        <label for="">Contraseña:</label>
        <input type="password" name="contrasenia">

        <br><br>
        <input type="submit" value="Iniciar sesión" name="iniciarSesion" class="boton">
    </form>
<?php
}

