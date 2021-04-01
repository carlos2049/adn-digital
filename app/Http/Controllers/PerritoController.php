<?php

namespace App\Http\Controllers;

use App\Perrito;
use Illuminate\Http\Request;

class PerritoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $perritos = Perrito::all();

        return response()->json(['data' => $perritos],200);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        $perritos = Perrito::create();

        return response()->json(['data' => $perritos],200);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Perrito  $perrito
     * @return \Illuminate\Http\Response
     */
    public function show(Perrito $perrito)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Perrito  $perrito
     * @return \Illuminate\Http\Response
     */
    public function edit(Perrito $perrito)
    {
        //
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

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Perrito  $perrito
     * @return \Illuminate\Http\Response
     */
    public function destroy(Perrito $perrito)
    {
        //
    }
}
