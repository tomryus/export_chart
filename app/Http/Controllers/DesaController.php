<?php

namespace App\Http\Controllers;

use App\desa;
use Illuminate\Http\Request;

class DesaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $desa = \App\desa::where('nama','like','%patane%')->orderBy('nama','ASC')->get();
        return view('home',['desa'=>$desa]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
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
     * @param  \App\desa  $desa
     * @return \Illuminate\Http\Response
     */
    public function show(desa $desa)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\desa  $desa
     * @return \Illuminate\Http\Response
     */
    public function edit(desa $desa)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\desa  $desa
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, desa $desa)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\desa  $desa
     * @return \Illuminate\Http\Response
     */
    public function destroy(desa $desa)
    {
        //
    }
}
