## Laravel PHP Framework

[![Build Status](https://travis-ci.org/laravel/framework.svg)](https://travis-ci.org/laravel/framework)
[![Total Downloads](https://poser.pugx.org/laravel/framework/d/total.svg)](https://packagist.org/packages/laravel/framework)
[![Latest Stable Version](https://poser.pugx.org/laravel/framework/v/stable.svg)](https://packagist.org/packages/laravel/framework)
[![Latest Unstable Version](https://poser.pugx.org/laravel/framework/v/unstable.svg)](https://packagist.org/packages/laravel/framework)
[![License](https://poser.pugx.org/laravel/framework/license.svg)](https://packagist.org/packages/laravel/framework)

Laravel is a web application framework with expressive, elegant syntax. We believe development must be an enjoyable, creative experience to be truly fulfilling. Laravel attempts to take the pain out of development by easing common tasks used in the majority of web projects, such as authentication, routing, sessions, queueing, and caching.

Laravel is accessible, yet powerful, providing powerful tools needed for large, robust applications. A superb inversion of control container, expressive migration system, and tightly integrated unit testing support give you the tools you need to build any application with which you are tasked.

## Official Documentation

Documentation for the framework can be found on the [Laravel website](http://laravel.com/docs).

## Contributing

Thank you for considering contributing to the Laravel framework! The contribution guide can be found in the [Laravel documentation](http://laravel.com/docs/contributions).

## Security Vulnerabilities

If you discover a security vulnerability within Laravel, please send an e-mail to Taylor Otwell at taylor@laravel.com. All security vulnerabilities will be promptly addressed.

### License

The Laravel framework is open-sourced software licensed under the [MIT license](http://opensource.org/licenses/MIT)

## Description proyect

En este pequeño ejecicio ejemplificamos una forma para elaborar un restfull desde laravel 5.1, la idea basica de los procesos siguientes es poder realizar un CRUD, por lo que antes de empezar debemos crear nuestro proyecto en laravel.

### Controller
Una vez hecho creado nuestro podemos empezar creando nuestro controlador con el siguiente comando ejecutandolo desde tu consola, en este caso desde el cmd de windows:
```
>>php artisan make:controller nombre_controlador;
```
ejemplo de la estructura general del controlador

``` bash
<?php

namespace App\Http\Controllers\Rest;

use App\Http\Controllers\Controller;

class RestController extends Controller
{
  public function index()
  {
  }
  public function show()
  {
  }
  public function create()
  {
  }
  public function store()
  {
  }
  public function edit()
  {
  }
  public function update()
  {
  }
  public function destroy()
  {
  }
}
?>
```

###Entities
Entities no es mas que una carpeta donde vamos almacenar clases que tendran toda la lojica para ejecutar el CRUD en laravel, como sabras existen método hacen esto estando en el controlador, sin embargo, en este ejercico se pretende tener una estructura mas estructurada ya que su funcionalidad esta dirigida a operaciones mas comlejas, de esta forma, separa los proceso parece conveniente.

###Models
para nuestros modelos tambien debemos crear una estrucutar de directorios para poder almacenar nuestras clases que serán las que representen nuestras tablas de la base de datos a la que haremos conexion. En este ejercicio se utilizó el nombre de Storage para la carpeta principal. Para crear modelos se utilizan los comando de laravel desde consola

```
>>php artisan make:model nombre_modelo
```

###namespace
Tanto en Entities como en las carpetas de los modelos se debe tener cuidado de colocar los namespace, ya que esto permite la llamada de las clases en todo se este haciendo referencia para poder usarla

namespace de Entities
```
namespace App\Entitie\nombre_folder;
```
namespace de Storage
```
namespace App\Storage;
```
### Definicion de un modelo
Sabemos que la clase recibe el mismo nombre a la tabla de la que hace referencia, y utilizando Snake Case, pero para ser mas especificos y para evitar tropiezos con los nombres de las tablas, lo definimos de la siguiente forma:
```
<?php

namespace App\Storage;

use Illuminate\Database\Eloquent\Model;

class Ciudades extends Model
{
//aqui se determina a que tabla hace referencia para poder heredar todos sus campos
    protected $table = 'ciudades';

//esta funcion permite omitir los compos que por default necesita laravel, como son created_at y updated_at
     public $timestamps = false;
}
```


##metodo Index
Recuerda que ya no trabajaremos directamente con el controlador, asi que lo unico que haremos en el controlador es simplificar su existencia, y pasaremos la carga de sus procesos a Entities, por lo que nuestro metodo index de nuestro controlador quedaria de la siguiente forma:

```
public function index()
    {
        $ciudad = new Ciudad();
        return \Response::json($ciudad->getIndex());

    }
```
¿Recuerdas que te mencione de colocar los namespace correctamente?
Bueno este es el momento de averiguar porque. En el controlador ya no vamos a usar 
```
public function getIndex()
    {
        $result = Ciudad::all();

        return $result;
    }

```
in your controller your index method which we are going to use should look as follows
```
//Response is used to obtain the results as json
    public function index()
    {
        $ciudad = new Ciudad();
        return \Response::json($ciudad->getIndex());

    }
```

the following methods you can run the same way as if you were in your controller, and all you have to do in your driver is making the right call to your classes Entitie.
consider using only one form for consultation in this exercise used "facades", here's a fashion of the head of my driver
```
<?php

namespace App\Http\Controllers\Rest;

//classes to which I refer in Entities
use App\Entitie\Ciudad\Ciudades as Ciudad;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Request;
use Illuminate\Support\Facades\Validator;

class RestController extends Controller
{
...
...
...
```
