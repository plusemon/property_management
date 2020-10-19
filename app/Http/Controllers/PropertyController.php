<?php

namespace App\Http\Controllers;

use App\Type;
use App\Property;
use Illuminate\Http\Request;

class PropertyController extends Controller
{
    public function index()
    {
        $properties = Property::all();
        $types = Type::whereType('property')->get();
        return view('rent.property.index', compact('properties', 'types'));
    }

    public function store(Request $request)
    {
        $request->validate([
            // 'serial' => 'required',
            'name' => 'required',
            'type_id' => 'required|integer',
            'rate' => 'required|integer',
            'district' => 'required|string',
            'street' => 'required',
            'city' => 'required',
            'country' => 'required',
        ]);

        $property = new Property();

        // $property->id = $request->serial;
        $property->name = $request->name;
        $property->type_id = $request->type_id;
        $property->rate = $request->rate;
        $property->district = $request->district;
        $property->street = $request->street;
        $property->city = $request->city;
        $property->country = $request->country;
        $property->created_at = $request->created_at;
        $property->save();

        return redirect()->back()->with('success','Added Succefully');
    }

    public function edit(Property $property)
    {
        $types = Type::whereType('property')->get();
        return view('rent.property.edit', compact('property','types'));
    }

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

        return redirect(route('property.index'))->with('success','Updated Succefully');
    }

    public function destroy(Property $property)
    {
        $property->delete();
        return redirect()->back()->with('success','Deleted Succefully');
    }

}
