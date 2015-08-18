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

In this way we will have the inicales laravel verbs to CRUD: a controller, which can be created with laravel using the "controller name_controler php artisan make" command is used.

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
created the "Entitie" folder to alamcenar classes will have our processes within entities can create sub folders to host your classes, be sure to attach the file php namespace. Example allow
```
namespace App\Entitie\name_folder;
```

we must understand in this exercise it is to use Entities to accommodate all the logical processes as totos show, show only one, insert, update, delete, processes that would in the driver created, but here we will do so more orders for avoid files

### Models
The models can be created with laravel or as a normal file php, just as I recommend staying their models in folders to have a more project sectioned and faster to locate their classes.

Example model:
```
<?php

namespace App\Storage;

use Illuminate\Database\Eloquent\Model;

class Ciudades extends Model
{
    protected $table = 'ciudades';

     public $timestamps = false;
}
```

##index method
recalls that this method will do so in the relevant class hosted Entities
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
