<?php

// el namespace es como el "apellido" de la interfaz, lo pide el PSR-12
namespace Ws\Interfaces;

// interfaz con un solo metodo, la clase que la implemente esta obligada a tener toJson()
interface IToJson
{
    public function toJson();
}
