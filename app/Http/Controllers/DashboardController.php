<?php

namespace App\Http\Controllers;

use App\Agreement;
use App\Payment;
use App\Property;
use App\Tent;

class DashboardController extends Controller
{
    public function index()
    {
        $counter = [];
        $counter['properties'] = Property::count();
        $counter['tents'] = Tent::count();
        $counter['agreements'] = Agreement::count();
        $counter['payments'] = Payment::count();
        return view('dashboard', compact('counter'));
    }

}
