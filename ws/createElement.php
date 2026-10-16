<?php

// el use va arriba del todo (lo pide el PSR-12), es solo para poder poner Element en vez del nombre entero
use Ws\Models\Element;

error_reporting(E_ALL);

// primero la interfaz y luego la clase, porque Element la necesita para el implements
require_once "./interfaces/IToJson.php";
require_once "./models/Element.php";

// 1. Recoger los datos que manda el formulario por POST
$nombre = trim($_POST["nombre"] ?? "");
$apellidos = trim($_POST["apellidos"] ?? "");
$password = trim($_POST["password"] ?? "");
$telefono = trim($_POST["telefono"] ?? "");
$email = trim($_POST["email"] ?? "");
$sexo = trim($_POST["sexo"] ?? "");

// 1.1 Comprobar que no falte ningun dato, voy guardando los errores en un array
$errores = [];

if (empty($nombre)) {
    $errores[] = "Falta el nombre";
}

if (empty($apellidos)) {
    $errores[] = "Faltan los apellidos";
}

if (empty($password)) {
    $errores[] = "Falta la contraseña";
}

if (empty($telefono)) {
    $errores[] = "Falta el teléfono";
}

if (empty($email)) {
    $errores[] = "Falta el email";
}

if (empty($sexo)) {
    $errores[] = "Falta seleccionar el sexo";
}

// si hay algun error lo devuelvo en JSON y paro aqui
if (count($errores) > 0) {
    header("Content-Type: application/json");
    echo json_encode([
        "success" => false,
        "message" => "Faltan datos en el formulario",
        "data" => $errores
    ], JSON_UNESCAPED_UNICODE);
    die;
}

// 2. Crear el elemento con los datos recogidos
$element = new Element($nombre, $apellidos, $password, $telefono, $email, $sexo);

// 3. Guardar el elemento en el txt sin sobrescribir lo que ya habia
// FILE_APPEND hace que se añada al final, y PHP_EOL es el salto de linea para que vaya uno por linea
$guardado = file_put_contents("./elementos.txt", $element->toJson() . PHP_EOL, FILE_APPEND);

if ($guardado === false) {
    header("Content-Type: application/json");
    echo json_encode([
        "success" => false,
        "message" => "No se ha podido guardar el elemento en el archivo",
        "data" => null
    ]);
    die;
}

// 4. Mostrar el elemento creado en JSON usando el metodo de la interfaz
header("Content-Type: application/json");
echo $element->toJson();
