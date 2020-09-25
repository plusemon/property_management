<?php

namespace App\Http\Controllers\Admin;

use App\Property;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Type;

class PropertyController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $properties = Property::all();
        return view('admin.rent.property.index', compact('properties'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $types = Type::all();
        return view('admin.rent.property.create', compact('types'));
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
            'type_id' => 'required|integer',
            'address' => 'required|string',
            'country' => 'required|string',
        ]);

        $property = new Property();
        $property->name = $request->name;
        $property->type_id = $request->type_id;
        $property->address = $request->address;
        $property->country = $request->country;
        $property->save();

        return redirect('admin/property')->with('success','Added Succefully');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Property  $property
     * @return \Illuminate\Http\Response
     */
    public function show(Property $property)
    {
       
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Property  $property
     * @return \Illuminate\Http\Response
     */
    public function edit(Property $property)
    {
        $types = Type::all();
        return view('admin.rent.property.edit', compact('property','types'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Property  $property
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Property $property)
    {
        $request->validate([
            'name' => 'required|string',
            'type_id' => 'required|integer',
            'address' => 'required|string',
            'country' => 'required|string',
        ]);
        $property->name = $request->name;
        $property->type_id = $request->type_id;
        $property->address = $request->address;
        $property->country = $request->country;
        $property->save();

        return redirect('admin/property')->with('success','Updated Succefully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Property  $property
     * @return \Illuminate\Http\Response
     */
    public function destroy(Property $property)
    {
        $property->delete();
        return redirect('admin/property')->with('success','Deleted Succefully');
    }
}
