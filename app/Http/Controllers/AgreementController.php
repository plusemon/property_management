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
            'advance' => 'required',
            'yearly_percent' => 'required',
            'attachment' => 'required',
        ]);

        $agreement = new Agreement();

        // $agreement->id = $request->serial;
        $agreement->name = $request->name;
        $agreement->user_id = Auth::id();
        $agreement->status = 0;
        $agreement->duration = $request->duration;
        $agreement->property_id = $request->property_id;
        $agreement->tent_id = $request->tent_id;
        $agreement->advance = $request->advance;
        $agreement->yearly_percent = $request->yearly_percent;

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

        $agreement->name = $request->name;
        $agreement->user_id = auth()->id();
        $agreement->property_id = $request->property_id;
        $agreement->tent_id = $request->tent_id;
        $agreement->advance = $request->advance;
        $agreement->yearly_percent = $request->yearly_percent;

        if ($request->attachment) {
            $url = $request->attachment->store('/agreement');
            $agreement->attachment = $url;
        }

        if ($request->created_at) {$agreement->created_at = $request->created_at;}

        $agreement->save();

        return redirect('admin/agreement')->with('success','Saved Succefully');
    }


    public function destroy(Agreement $agreement)
    {
        $agreement->delete();
        return redirect()->back()->with('success','Deleted Succefully');
    }

}
