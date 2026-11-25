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

    public function getFechaHora(): DateTime
    {
        return $this->_fechaHora;
    }

    /* ====== TOSTRING ====== */
    public function __toString(): string
    {
        return $this->getFechaHora()->format("d/m/Y H:i:s"). " - " . $this->getTexto();
    }

    /* ====== MÉTODOS MÁGICOS (EVITAR SOBRECARGA DINÁMICA) ====== */
    public function __get($name)
    {
        throw new Exception('Esta clase no permite la sobrecarga dinámica');
    }        
    
    public function __set($name, $value)
    {
        throw new Exception('Esta clase no permite la sobrecarga dinámica');
    }

    public function __isset($name)
    {
        throw new Exception('Esta clase no permite la sobrecarga dinámica');
    }

    public function __unset($name)
    {
        throw new Exception('Esta clase no permite la sobrecarga dinámica');
    }
}