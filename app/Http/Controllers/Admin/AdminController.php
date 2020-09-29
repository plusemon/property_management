<?php

namespace App\Http\Controllers\Admin;

use App\Agreement;
use App\Http\Controllers\Controller;
use App\Payment;
use App\Property;
use App\Tent;

class AdminController extends Controller
{
    public function dashboard()
    {
        $counter = [];
        $counter['properties'] = Property::count();
        $counter['tents'] = Tent::count();
        $counter['agreements'] = Agreement::count();
        $counter['payments'] = Payment::count();
        return view('admin.dashboard', compact('counter'));
    }
}
