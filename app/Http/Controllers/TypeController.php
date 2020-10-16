<?php

namespace App\Http\Controllers;

use App\Type;
use Illuminate\Http\Request;
use App\Setting;


class TypeController extends Controller
{
    public function index()
    {
        $types = Type::all();
        return view('rent.property.type.index', compact('types'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'type' => 'required'
        ]);

        $type = new Type();

        if (!Type::count()) {
            $type->id = Setting::first()->serial;
        }

        if ($request->created_at) {
            $type->created_at = $request->created_at;
        }
        $type->name = $request->name;
        $type->type = $request->type;
        $type->save();

        return redirect()->back()->with('success', 'Added Succefully');
    }


    public function edit(Type $type)
    {
        return view('rent.property.type.edit', compact('type'));
    }

    public function update(Request $request, Type $type)
    {
        $request->validate([
            'name' => 'required'
        ]);

        $type->name = $request->name;
        $type->save();

        return redirect(route('type.index'))->with('success', 'Updated Succefully');
    }

    public function destroy(Type $type)
    {
        $type->delete();
        return redirect()->back()->with('success', 'Deleted Succefully');
    }
}
