<?php

namespace App\Http\Controllers\Admin;

use App\Type;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class TypeController extends Controller
{
    public function index()
    {
        $types = Type::all();
        return view('admin.rent.property.type.index', compact('types'));
    }

    public function create()
    {
        return view('admin.rent.property.type.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'type' => 'required'
        ]);

        $type = new Type();
        if ($request->created_at) {
            $type->created_at = $request->created_at; 
        }
        $type->name = $request->name; 
        $type->type = $request->type;
        $type->save();

        return redirect('admin/property/type')->with('success','Added Succefully');
    }

    public function show(Type $type)
    {
        //
    }

    public function edit(Type $type)
    {
        return view('admin.rent.property.type.edit', compact('type'));
    }

    public function update(Request $request, Type $type)
    {
        $request->validate([
            'name' => 'required'
        ]);

        $type->name = $request->name;
        $type->save();

        return redirect('admin/property/type')->with('success','Updated Succefully');
    }

    public function destroy(Type $type)
    {
        $type->delete();
        return redirect('admin/property/type')->with('success','Deleted Succefully');
    }
}
