<?php

namespace App\Http\Controllers\Rest;

// use App\Http\Request;
// use Illuminate\Http\Request;
use App\Entitie\Ciudad\Ciudades as Ciudad;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Request;
use Illuminate\Support\Facades\Validator;

class RestController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index()
    {
        $ciudad = new Ciudad();
        return \Response::json($ciudad->getIndex());

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  Request  $request
     * @return Response
     */
    public function store()
    {
        $data = Request::all();

        $rules = array(
            'city' => 'required',
            'message' => 'required',
            );

        $valid = Validator::make($data, $rules);

        if ($valid->fails()) {

            // $errors = json_encode($valid->errors());
            return \Response::json($valid->errors(), 500);

        } else {
            $ciudad = new Ciudad();
            return $ciudad->add($data);
        }

        
        
        // $ciudad = $request->input('CIUDAD');
        // $result = new Ciudad();
        // return $result->addCiudad($data);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function show($id)
    {
        $result = new Ciudad();

        echo $result->getCiudad($id);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  Request  $request
     * @param  int  $id
     * @return Response
     */
    public function update($id)
    {
        $data = Request::all();

        $ciudad = new Ciudad();
        return $ciudad->update($data, $id);

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return Response
     */
    public function destroy($id)
    {
        $ciudad = new Ciudad();

        return $ciudad->destroy($id);
    }
}
