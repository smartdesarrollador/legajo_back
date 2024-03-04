<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\Accion;

use Illuminate\Http\Response;


class AccionController extends Controller
{
    public function index()
    {
        //
        return Accion::all();
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $acciones=Accion::create($request->all());
        return response()->json([
            'message'=>"Registro creado satisfactoriamente",
            'category'=>$acciones
        ],Response::HTTP_CREATED);
    }

    /**
     * Display the specified resource.
     */
    public function show(Request $request)
    {
        //

    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Request $request)
    {
        //
    }
}
