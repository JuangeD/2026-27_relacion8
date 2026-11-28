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

$datos = [
    "login" => ""
];
$errores = [];

if(isset($_POST["iniciarSesion"]))
{
    $datos["login"]= $_POST["login"];

    if($datos["login"]==="")
        $errores["login"][]="El login es obligatorio";
    else
        if(!$acl->existeUsuario($datos['login']))
            $errores["login"][]="El usuario indicado no existe";

    if($_POST["contrasenia"]==="")
        $errores["contrasenia"][]="Es necesario indicar una contraseña";

    if(!$acl->esValido($datos["login"], $_POST["contrasenia"]))
        $errores["Login/contrasenia"][] = "Login/contraseña incorrectos";
    else
    {
        $codUsu = $acl->getCodUsuario($datos["login"]);
        $acceso->registrarUsuario($datos['login'], $acl->getNombre($codUsu), $acl->getPermisos($codUsu));
    }

}

if($acceso->hayUsuario())
{
    if(isset($_SESSION["request"]))
    {
        $request = $_SESSION["request"];
        unset($_SESSION["request"]);
        header("Location: $request");
        exit();
    }

    header("Location: /index.php");
    exit();
}

//dibuja la plantilla de la vista
inicioCabecera("login");
cabecera();
finCabecera();
inicioCuerpo("LOGIN", $barra);
cuerpo($datos, $errores);  //llamo a la vista
finCuerpo();
// **********************************************************

//vista
function cabecera() 
{
    ?>
    <?php
}

//vista
function cuerpo(array $datos, array $errores)
{

    if(isset($errores["Login/contrasenia"]))
        echo mostrarErroresLinea("Login/contrasenia", $errores, "div", true);
?>
    <br><br>
    <form action="" method="post">
        <!-- Login -->
        <label for="">Login:</label>
        <input type="text" name="login" autofocus placeholder="Nickname" value="<?php if(!empty($errores)) echo $datos["login"] ?>">
        <?php if(isset($errores["login"])) echo mostrarErroresLinea("login", $errores, "span", true); ?>

        <!-- Contraseña -->
        <br>
        <label for="">Contraseña:</label>
        <input type="password" name="contrasenia" placeholder="Contraseña">
        <?php if(isset($errores["contrasenia"])) echo mostrarErroresLinea("contrasenia", $errores, "span", true); ?>

        <br><br>
        <input type="submit" value="Iniciar sesión" name="iniciarSesion" class="boton">
    </form>
<?php
}

