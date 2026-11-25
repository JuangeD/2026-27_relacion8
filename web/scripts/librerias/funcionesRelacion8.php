<?php
/**
 * Función que establece el límite de duración
 * de las cookies, actualmente son 2 días
 * 
 * @return int
 */
function expiracionCookie(): int
{
    return time()+60*60*24*2;
}

/**
 * Función que inicializa u obtiene los valores de las cookies
 * de los colores del texto y fondo
 * 
 * @return array|array{fondo: string, texto: string}
 */
function setCookiesColores(): array
{
    $estilos = [
    "texto"=>"black",
    "fondo"=>"white"
    ];


    if(isset($_COOKIE["fondo"]))
        if(validaRango($_COOKIE["fondo"], COLORESFONDO, 2))
            $estilos["fondo"]=$_COOKIE["fondo"];
    else
        generarCookie("fondo", "white", expiracionCookie(), "/aplicacion/personalizar");

    if(isset($_COOKIE["texto"]))
        if(validaRango($_COOKIE["texto"], COLORESTEXTO, 2))
            $estilos["texto"]=$_COOKIE["texto"];
    else
        generarCookie("texto", "black", expiracionCookie(), "/aplicacion/personalizar");

    return $estilos;
}

/**
 * Función que incializa u obtiene el valor
 * de la cookie de 'visitas'
 * 
 * @return int
 */
function setCookieVisitas(): int
{
    $visitas = 1;

    if(isset($_COOKIE["visitas"]))
        $visitas=$_COOKIE["visitas"];
    else
        generarCookie("visitas", $visitas, expiracionCookie(), "/aplicacion/personalizar/index.php");

    return $visitas;
}

/**
 * Función que permite generar las cookies o
 * modificar su valor si ya existen
 * 
 * @param string $nombre nombre de la cookie
 * @param mixed $valor valor de la cookie
 * @param int $expiracion expiración de la cookie, por defecto el valor de expiracionCookie()
 * @param string $ruta ruta de la cookie, por defecto '/'
 * @return void
 */
function generarCookie(string $nombre, mixed $valor, ?int $expiracion=0, ?string $ruta="/"): void
{
    if($expiracion===0)
        $expiracion = expiracionCookie();

    setcookie($nombre, $valor, $expiracion, $ruta);
}