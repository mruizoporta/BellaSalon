<?php

namespace App\Http\Controllers;

use App\Models\citas;
use Illuminate\Http\Request;

class CitasController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
       
        return view('citas.index');
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
    public function show(citas $citas)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, citas $citas)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(citas $citas)
    {
        //
    }
}
