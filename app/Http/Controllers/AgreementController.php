<?php

namespace App\Http\Controllers;

use App\Tent;
use App\Type;
use App\Agreement;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AgreementController extends Controller
{
    public function index()
    {
        $agreements = Agreement::all();
        $types = Type::where('type', 'property')->get();
        $tents = Tent::all();
        return view('rent.agreement.index', compact('agreements', 'types', 'tents'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|unique:agreements',
            'property_id' => 'required',
            'tent_id' => 'required',
            'security' => 'required|integer',
            'rent' => 'required|integer',
            'period' => 'required|integer',
        ]);

        $agreement = new Agreement();

        // $agreement->id = $request->serial;
        $agreement->property_id = $request->property_id;
        $agreement->tent_id = $request->tent_id;
        $agreement->entry_id = Auth::id();
        $agreement->name = $request->name;
        $agreement->rent = $request->rent;
        $agreement->period = $request->period;
        $agreement->security = $request->security;
        $agreement->incr = $request->incr;

        if ($request->attachment) {
            $url = $request->attachment->store('/agreement');
            $agreement->attachment = $url;
        }

        $agreement->created_at = $request->created_at;
        $agreement->save();

        return redirect()->back()->with('success','Saved Succefully');
    }


    public function show(Agreement $agreement)
    {
        // return $agreement;
        return view('rent.agreement.show',compact('agreement'));
    }

    public function edit(Agreement $agreement)
    {
        $types = Type::all();
        $tents = Tent::all();
        return view('rent.agreement.edit', compact('agreement', 'types', 'tents'));
    }


    public function update(Request $request, Agreement $agreement)
    {
        if ($request->has('status')) {
           $agreement->status = $request->status;
           $agreement->save();
           return redirect()->back()->with('success','Updated Succefully');
        }

        $agreement->property_id = $request->property_id;
        $agreement->tent_id = $request->tent_id;
        $agreement->entry_id = Auth::id();
        $agreement->name = $request->name;
        $agreement->rent = $request->rent;
        $agreement->period = $request->period;
        $agreement->security = $request->security;
        $agreement->incr = $request->incr;

        if ($request->attachment) {
            $url = $request->attachment->store('/agreement');
            $agreement->attachment = $url;
        }

        $agreement->created_at = $request->created_at;
        $agreement->save();

        return redirect(route('agreement.index'))->with('success','Saved Succefully');
    }


    public function destroy(Agreement $agreement)
    {
        $agreement->delete();
        return redirect()->back()->with('success','Deleted Succefully');
    }

}
