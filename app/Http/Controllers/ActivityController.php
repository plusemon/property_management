<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Spatie\Activitylog\Models\Activity;

class ActivityController extends Controller
{
    public function index($name , $id)
    {
        $activities = Activity::whereLogName($name)->whereSubjectId($id)->get();
        return view('activity.index', compact('activities'));
    }

    public function show(Activity $activity)
    {
        return view('activity.show', compact('activity'));
    }
}
