<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class BrowController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.brow.create');
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
     * @param  \App\Brow  $brow
     * @return \Illuminate\Http\Response
     */
    public function show(Brow $brow)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Brow  $brow
     * @return \Illuminate\Http\Response
     */
    public function edit(Brow $brow)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Brow  $brow
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Brow $brow)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Brow  $brow
     * @return \Illuminate\Http\Response
     */
    public function destroy(Brow $brow)
    {
        //
    }
}
