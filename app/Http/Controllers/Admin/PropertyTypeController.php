<?php

namespace App\Http\Controllers\Admin;

use App\Property_type;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Mockery\Matcher\Type;

class PropertyTypeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $types = Property_type::all();
        return view('admin.rent.property.type.index', compact('$types'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.rent.property.type.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string',
            'description' => 'text|required'
        ]);

        $type = new Property_type();
        $type->name = $request->name;
        $type->description = $request->description;
        $type->save();

        return redirect('admin/property/type')->with('success','Type Added Succefully');
        
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Property_type  $property_type
     * @return \Illuminate\Http\Response
     */
    public function show(Property_type $property_type)
    {
        return 'show method';
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Property_type  $property_type
     * @return \Illuminate\Http\Response
     */
    public function edit(Property_type $property_type)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Property_type  $property_type
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Property_type $property_type)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Property_type  $property_type
     * @return \Illuminate\Http\Response
     */
    public function destroy(Property_type $property_type)
    {
        //
    }
}
