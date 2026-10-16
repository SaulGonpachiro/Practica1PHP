# Práctica 1 PHP

Formulario de la práctica de HTML cambiado para que mande los datos por POST a `ws/createElement.php`, que crea un `Element`, lo guarda en un txt y lo enseña en JSON.

## Estructura

```
formulario.html          -> el formulario, action a ./ws/createElement.php y method POST
ws/
  interfaces/IToJson.php -> interfaz IToJson con el metodo toJson()
  models/Element.php     -> clase Element (implementa IToJson), propiedades, constructor, getters y setters
  createElement.php      -> recoge el POST, crea el Element, lo guarda y lo muestra
  elementos.txt          -> se crea solo la primera vez que envias el formulario
```

## Como funciona createElement.php

1. Recoge los datos del POST con `?? ""` y `trim` por si vienen vacios o con espacios.
2. Comprueba con `empty` que no falte nada, si falta algo devuelve un JSON con los errores y para.
3. Crea el `Element` con los datos.
4. Lo guarda en `elementos.txt` con `file_put_contents` y `FILE_APPEND`, asi no se borra lo que ya habia. Cada elemento va en una linea.
5. Muestra el elemento con `toJson()`.

## Probarlo

- Meter la carpeta en `htdocs` de XAMPP y abrir `localhost/Practica1PHP/formulario.html`.
- O con Postman: POST a `localhost/Practica1PHP/ws/createElement.php`, body `x-www-form-urlencoded` con las claves `nombre`, `apellidos`, `password`, `telefono`, `email` y `sexo`.

He pasado el PHP_CodeSniffer con PSR-12 y no da ningun error. Por eso las clases tienen namespace y las llaves de las clases y metodos van en la linea de abajo.
