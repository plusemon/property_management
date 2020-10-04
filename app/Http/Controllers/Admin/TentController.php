<?php

namespace App\Http\Controllers\Admin;

use App\Tent;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class TentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $tents = Tent::all();
        return view('admin.rent.tent.index', compact('tents'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.rent.tent.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        $tent = new Tent();

        //  tent cnic attachment
        if (isset($request->tent['cnica'])) {
            $url = $request->tent['cnica']->store('/tent');
            $tent->cnica = $url;
        }

        //  granter 1 cnic attachment
        if (isset($request->g1['cnica'])) {
            $g1url = $request->g1['cnica']->store('/tent');
            $tent->g1_cnica = $g1url;
        }

        //  granter 2 cnic attachment
        if (isset($request->g2['cnica'])) {
            $g2url = $request->g2['cnica']->store('/tent');
            $tent->g2_cnica = $g2url;
        }


        $tent->fname = $request->tent['fname'];
        $tent->lname = $request->tent['lname'];
        $tent->cnic = $request->tent['cnic'];
        $tent->address = $request->tent['address'];
        $tent->city = $request->tent['city'];
        $tent->country = $request->tent['country'];
        $tent->contact1 = $request->tent['contact'][0];

        if (isset($request->tent['contact'][1])) {
            $tent->contact2 = $request->tent['contact'][1];
        }
        if (isset($request->tent['contact'][2])) {
            $tent->contact3 = $request->tent['contact'][2];
        }


        $tent->g1_fname = $request->g1['fname'];
        $tent->g1_lname = $request->g1['lname'];
        $tent->g1_cnic = $request->g1['cnic'];
        $tent->g1_address = $request->g1['address'];
        $tent->g1_city = $request->g1['city'];
        $tent->g1_country = $request->g1['country'];
        $tent->g1_contact1 = $request->g1['contact'][0];

        if (isset($request->g1['contact'][1])) {
            $tent->g1_contact2 = $request->g1['contact'][1];
        }

        if (isset($request->g1['contact'][2])) {
            $tent->g1_contact3 = $request->g1['contact'][2];
        }

        $tent->g2_fname = $request->g2['fname'];
        $tent->g2_lname = $request->g2['lname'];
        $tent->g2_cnic = $request->g2['cnic'];
        $tent->g2_address = $request->g2['address'];
        $tent->g2_city = $request->g2['city'];
        $tent->g2_country = $request->g2['country'];
        $tent->g2_contact1 = $request->g2['contact'][0];

        if (isset($request->g2['contact'][1])) {
            $tent->g2_contact2 = $request->g2['contact'][1];
        }

        if (isset($request->g2['contact'][2])) {
            $tent->g2_contact3 = $request->g2['contact'][2];
        }

        // return $tent;

        $tent->save();

        return redirect('admin/tent')->with('success', 'Added Succefully');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Tent  $tent
     * @return \Illuminate\Http\Response
     */
    public function show(Tent $tent)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Tent  $tent
     * @return \Illuminate\Http\Response
     */
    public function edit(Tent $tent)
    {
        return view('admin.rent.tent.edit');
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Tent  $tent
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Tent $tent)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Tent  $tent
     * @return \Illuminate\Http\Response
     */
    public function destroy(Tent $tent)
    {
        $tent->delete();
        return redirect('admin/tent')->with('success', 'Deleted Succefully');
    }
}
