<?php

namespace App\Http\Controllers\Admin;

use App\Agreement;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Property;
use App\Tent;
use App\Type;

class AgreementController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $agreements = Agreement::all();
        $types = Type::all();
        $tents = Tent::all();
        return view('admin.rent.agreement.index', compact('agreements', 'types', 'tents'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // return $request;
        $request->validate([
            'name' => 'required|unique:agreements',
            'property_id' => 'required',
            'tent_id' => 'required',
            'advance' => 'required',
            'yearly_percent' => 'required',
            'attachment' => 'required',
        ]);

        $agreement = new Agreement();
        $agreement->name = $request->name;
        $agreement->user_id = 1;
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

    /**
     * Display the specified resource.
     *
     * @param  \App\Agreement  $agreement
     * @return \Illuminate\Http\Response
     */
    public function show(Agreement $agreement)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Agreement  $agreement
     * @return \Illuminate\Http\Response
     */
    public function edit(Agreement $agreement)
    {
        $types = Type::all();
        $tents = Tent::all();
        return view('admin.rent.agreement.edit', compact('agreement', 'types', 'tents'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Agreement  $agreement
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Agreement $agreement)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Agreement  $agreement
     * @return \Illuminate\Http\Response
     */
    public function destroy(Agreement $agreement)
    {
        //
    }


}
