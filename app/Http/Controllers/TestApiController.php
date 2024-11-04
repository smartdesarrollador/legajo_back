<?php

namespace App\Http\Controllers;

use App\Models\TestApi;
use App\Models\Accion;
use Illuminate\Http\Request;

class TestApiController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        return TestApi::all();
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(TestApi $testApi)
    {
        //
        return $testApi;
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, TestApi $testApi)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(TestApi $testApi)
    {
        //
    }
}
