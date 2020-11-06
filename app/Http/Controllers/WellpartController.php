<?php

namespace App\Http\Controllers;

use App\Accountant;
use App\User;
use App\Wellpart;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class WellpartController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $wellparts = Wellpart::all();
        return view('well_part.index', compact('wellparts'));
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
        $request->validate([
            'user_id' => 'required|integer',
            'amount' => 'required|integer|gt:0',
        ]);

        $wellpart = new Wellpart();
        $wellpart->id = $request->serial;
        $wellpart->user_id = $request->user_id;
        if (!($wellpart->accountant_id = Accountant::active()->id)) {
            return redirect(route('accountant.index'))->with('info','Set an accountant first');
        }
        $wellpart->entry_id = Auth::id();
        $wellpart->amount = $request->amount;
        $wellpart->description = $request->description;
        $wellpart->created_at = $request->created_at;
        $wellpart->save();
        return redirect()->back()->with('success','Added Successfully');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Wellpart  $wellpart
     * @return \Illuminate\Http\Response
     */
    public function show(Wellpart $wellpart)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Wellpart  $wellpart
     * @return \Illuminate\Http\Response
     */
    public function edit(Wellpart $wellpart)
    {
        $users = User::role('user')->get();
        return view('well_part.edit', compact('wellpart','users'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Wellpart  $wellpart
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Wellpart $wellpart)
    {
        $wellpart->update($request->all());
        return redirect('admin/well_part')->with('success','Updated Successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Wellpart  $wellpart
     * @return \Illuminate\Http\Response
     */
    public function destroy(Wellpart $wellpart)
    {
        $wellpart->delete();
        return redirect()->back()->with('success','Added Successfully');
    }
}
