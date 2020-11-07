<?php

namespace App\Http\Controllers;

use App\Tent;
use App\Agreement;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AgreementController extends Controller
{

    public function __construct()
    {
        // Check and expire agreements when period is over
        Agreement::whereNull('incr_at')->each(function ($agreement) {
            if (Agreement::isExpired($agreement->id)) {
                $agreement->incr_at = today();
                $agreement->status = false;
                $agreement->rent += ($agreement->rent * $agreement->incr)/100;
                $agreement->save();

            }
        });
    }

    public function index()
    {
        $agreements = Agreement::all();
        $tents = Tent::all();
        return view('rent.agreement.index', compact('agreements', 'tents'));
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
        $tents = Tent::all();
        return view('rent.agreement.edit', compact('agreement', 'tents'));
    }


    public function update(Request $request, Agreement $agreement)
    {
        # for update status only
        if ($request->has('status')) {
           $agreement->status = $request->status;
           $agreement->save();
           return redirect()->back()->with('success','Updated Succefully');
        }

        # for renew a agreement
        if (request()->expired) {
            $agreement->created_at = now();
            $agreement->status = 1;
            $agreement->incr_at = null;
            $agreement->save();
            return redirect(route('agreement.index'))->with('success','Agreement Renewed Successfully');
        }


        $agreement->property_id = $request->property_id;
        $agreement->tent_id = $request->tent_id;
        $agreement->entry_id = Auth::id();
        $agreement->name = $request->name;
        $agreement->rent = $request->rent;
        $agreement->period = $request->period;
        $agreement->security = $request->security;
        $agreement->incr = $request->incr;

        # if attachment available
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
