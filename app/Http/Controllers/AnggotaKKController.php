<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AnggotaKKController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('anggotakk');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('anggotakk_input');
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
    public function show(string $id)
    {
        return view('anggotakk_edit');
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
