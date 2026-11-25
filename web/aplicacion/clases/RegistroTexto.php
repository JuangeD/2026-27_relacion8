<?php

class RegistroTexto {
    /* Propiedades */
    private string $_texto;
    private DateTime $_fechaHora;

    public function __construct(string $texto)
    {
        $this->_texto = $texto;
        $this->_fechaHora = new DateTime("now");
    }

    /* GETTERS */
    public function getTexto(): string
    {
        return $this->_texto;
    }

    public function getFechaHora(): string
    {
        return $this->_fechaHora->format("d/m/Y H:i:s");
    }
}