<?php

namespace App\Http\Controllers;

use App\Setting;
use Illuminate\Http\Request;
use phpDocumentor\Reflection\Types\Void_;

class SettingController extends Controller
{

    public function index()
    {
        $setting = Setting::firstOrCreate([]);
        return view('settings.edit',compact('setting'));
    }


    public function edit(Setting $setting)
    {
        $setting = Setting::firstOrCreate([]);
       return view('settings.edit',compact('setting'));
    }


    public function update(Request $request, Setting $setting)
    {
        $request->validate([
            'name' => 'string|min:3',
        ]);

        $setting->name = $request->name;
        $setting->save();

        return redirect()->back()->with('success','Saved Successfully');
    }
}
