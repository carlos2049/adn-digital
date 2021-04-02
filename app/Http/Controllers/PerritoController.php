<?php

namespace App\Http\Controllers;

use App\Perrito;
use Illuminate\Http\Request;
use SebastianBergmann\Environment\Console;

class PerritoController extends Controller
{

    public function getDogs (){

        $perritos = Perrito::all();

        return response()->json(['data' => $perritos],200);
    }

    public function createDog(Request $request){

        $rules= [
            'nombre' => 'required',
            'color' => 'required',
            'raza' => 'required',
        ];

        $quotation = [
            'nombre' => $request->nombre,
             'color' => $request->color,
             'raza' => $request->raza,
         ];

         $this->validate($request, $rules);
        // dd($request);
        $dogCreated = Perrito::create($quotation);
        return response()->json(['data'=> $dogCreated], 200);
    }

    public function updateDog(Request $request, $id){

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




    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Perrito  $perrito
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Perrito $perrito)
    {
        //
    }


}
