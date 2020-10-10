<?php

namespace App\Http\Controllers\Admin;

use App\Agreement;
use App\Http\Controllers\Controller;
use App\Payment;
use App\Property;
use App\Tent;
use Illuminate\Support\Facades\Request;

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

    public function setting()
    {
        $settings = [
            'id' => 1,
            'title' => 'Dashboard'
        ];
        return view('admin.settings.edit', compact('settings'));
    }

    public function settingUpdate(Request $request)
    {
        $setting = [
            'id' => 1,
            'title' => 'Dashboard'
        ];
        return redirect()->back()->with('success', 'Updated Successfully');
    }
}
