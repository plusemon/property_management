<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Spatie\Activitylog\Models\Activity;

class ActivityController extends Controller
{
    public function index()
    {
    //    return Activity::all()->first()->changes['old'];
        $activities = Activity::all();
        return view('activity.index',compact('activities'));
    }

    public function show(Activity $activity)
    {
        return view('activity.show', compact('activity'));
    }
}
