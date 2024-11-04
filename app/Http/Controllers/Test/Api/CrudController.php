<?php

namespace App\Http\Controllers\Test\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\test_categorias;
use App\Http\Requests\Test\TestCategoriasRequest;
use Illuminate\Http\Response;

class CrudController extends Controller
{
    public function index(){
        $categories=test_categorias::all();
        return response()->json($categories,Response::HTTP_OK);
    }

    public function store(TestCategoriasRequest $request){
        $category=test_categorias::create($request->all());
        return response()->json([
            'message'=>"Registro creado satisfactoriamente",
            'category'=>$category
        ],Response::HTTP_CREATED);
    }

    public function update(TestCategoriasRequest $request,$category){
        $category=test_categorias::find($category);
        $category->update($request->only('name','slug'));
        return response()->json([
            'message'=>"Registro actualizado satisfactoriamente",
            'category'=>$category
        ],Response::HTTP_CREATED);
    }

    public function destroy($category){
        $category=test_categorias::find($category);
        $category->delete();
        return response()->json([
            'message'=>"Registro eliminado satisfactoriamente"
        ],Response::HTTP_OK);
    }
}
