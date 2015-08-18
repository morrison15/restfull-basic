<?php

namespace App\Entitie\Ciudad;

use App\Storage\Ciudades as Ciudad;

use App\Http\Requests;
// use Illuminate\Http\Request;
use Illuminate\Support\Facades\Request;

class Ciudades
{

    public $restful = true;
    public $data = array();

 
    public function getIndex()
    {
        $result = Ciudad::all();

        return $result;
    }

    public function getCiudad($id)
    {
        $result = Ciudad::find($id);

        return $result;
    }

    public function add($request)
    {
        \DB::insert('insert into ciudades(ciudad, mensaje) values (?, ?)', [$request['ciudad'], $request['mensaje']]);

        return 'Exito';
    }

    public function update($request, $id)
    {
        $ciudad = Ciudad::findOrFail($id);
        $ciudad->ciudad = $request['ciudad'];
        $ciudad->mensaje = $request['mensaje'];
        $ciudad->save();

        return 'Exito';
    }

    public function destroy($id)
    {
        $ciudad = Ciudad::findOrFail($id);
        $ciudad->delete();

        return 'Register'.''.$id.' '.'Deleted';
    }
}
