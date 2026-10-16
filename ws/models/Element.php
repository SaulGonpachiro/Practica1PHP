<?php

namespace Ws\Models;

// el require de la interfaz lo hace createElement.php, aqui solo digo cual uso
use Ws\Interfaces\IToJson;

class Element implements IToJson
{
    // una propiedad por cada campo del formulario
    public string $nombre;
    public string $apellidos;
    public string $password;
    public string $telefono;
    public string $email;
    public string $sexo;

    public function __construct(
        string $nombre,
        string $apellidos,
        string $password,
        string $telefono,
        string $email,
        string $sexo
    ) {
        $this->nombre = $nombre;
        $this->apellidos = $apellidos;
        $this->password = $password;
        $this->telefono = $telefono;
        $this->email = $email;
        $this->sexo = $sexo;
    }

    // Getters
    public function getNombre()
    {
        return $this->nombre;
    }

    public function getApellidos()
    {
        return $this->apellidos;
    }

    public function getPassword()
    {
        return $this->password;
    }

    public function getTelefono()
    {
        return $this->telefono;
    }

    public function getEmail()
    {
        return $this->email;
    }

    public function getSexo()
    {
        return $this->sexo;
    }

    // Setters
    public function setNombre(string $nombre)
    {
        $this->nombre = $nombre;
    }

    public function setApellidos(string $apellidos)
    {
        $this->apellidos = $apellidos;
    }

    public function setPassword(string $password)
    {
        $this->password = $password;
    }

    public function setTelefono(string $telefono)
    {
        $this->telefono = $telefono;
    }

    public function setEmail(string $email)
    {
        $this->email = $email;
    }

    public function setSexo(string $sexo)
    {
        $this->sexo = $sexo;
    }

    // el metodo de la interfaz, devuelve todo el elemento como un string en JSON
    public function toJson()
    {
        // JSON_UNESCAPED_UNICODE para que las tildes y la ñ salgan bien y no como ñ
        return json_encode([
            "nombre" => $this->nombre,
            "apellidos" => $this->apellidos,
            "password" => $this->password,
            "telefono" => $this->telefono,
            "email" => $this->email,
            "sexo" => $this->sexo
        ], JSON_UNESCAPED_UNICODE);
    }
}
