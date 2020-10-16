<?php

namespace App\Http\Controllers;

use App\Setting;
use Illuminate\Http\Request;

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
            'serial' => 'integer'
        ]);

        $setting->name = $request->name;
        $setting->serial = $request->serial;
        $setting->save();

        return redirect()->back()->with('success','Saved Successfully');
    }

}
