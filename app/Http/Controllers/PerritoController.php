<?php

namespace App\Http\Controllers;

use App\Perrito;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

use SebastianBergmann\Environment\Console;

class PerritoController extends Controller
{

    public function getDogs (){

        $perritos = Perrito::all();
        return response()->json(['data' => $perritos],200);
    }


    public function createDog(Request $request){

        $validator = Validator::make($request->all(),
        [
            'nombre' => 'required',
            'color' => 'required',
            'raza' => 'required',
        ]);

        if($validator->fails()){
            return response()->json($validator->messages(), 400);
        }

        $buscarPerrito = Perrito::where('nombre',$request->nombre)->count();
        if($buscarPerrito != 0 ){
            return response()->json(['message'=> "ya existe un perrito con ese nombre", "success"=> false], 200);
        }
        $perrito = [
            'nombre' => $request->nombre,
            'color' => $request->color,
            'raza' => $request->raza,
        ];
        $perritoCreado = Perrito::create($perrito);
        return response()->json(['data'=> $perritoCreado], 200);
    }


    public function updateDog(Request $request, $id){

        $validator = Validator::make($request->all(),
        [
            'nombre' => 'required',
            'color' => 'required',
            'raza' => 'required',
        ]);

        if($validator->fails()){
            return response()->json($validator->messages(), 400);
        }
        $buscarPerrito = Perrito::where('nombre',$request->nombre)->count();
        if($buscarPerrito != 0 ){
            return response()->json(['message'=> "ya existe un perrito con ese nombre", "success"=> false], 200);
        }

        $perrito = Perrito::find($id);

        if($request->has('nombre')){
            $perrito->nombre = $request->nombre;
        }
        if($request->has('color')){
            $perrito->color = $request->color;
        }
        if($request->has('raza')){
            $perrito->raza = $request->raza;
        }
        $perrito->save();
        return response()->json(['data'=> $perrito], 200);
    }


    public function deleteDog(Request $request, $id){

        $perrito = Perrito::find($id);
        $perrito->delete();
        return response()->json(['data'=> $perrito], 200);
    }
}
