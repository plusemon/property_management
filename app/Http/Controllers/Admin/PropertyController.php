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
        $types = Type::where('type','property')->get();
        $properties = Property::all();
        return view('admin.rent.property.index', compact('properties', 'types'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
       
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
            'name' => 'required|unique:properties',
            'type_id' => 'required',
            'rate' => 'required',
            'district' => 'required',
            'street' => 'required',
            'city' => 'required',
            'country' => 'required',
        ]);

        $property = new Property();

        if ($request->created_at) {$property->created_at = $request->created_at;}
        $property->name = $request->name;
        $property->type_id = $request->type_id;
        $property->rate = $request->rate;
        $property->district = $request->district;
        $property->street = $request->street;
        $property->city = $request->city;
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
            'name' => 'required',
            'type_id' => 'required',
            'rate' => 'required',
            'district' => 'required',
            'street' => 'required',
            'city' => 'required',
            'country' => 'required',
        ]);

        if ($request->created_at) {$property->created_at = $request->created_at;}
        $property->name = $request->name;
        $property->type_id = $request->type_id;
        $property->rate = $request->rate;
        $property->district = $request->district;
        $property->street = $request->street;
        $property->city = $request->city;
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
