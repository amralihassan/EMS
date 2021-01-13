<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Spatie\Activitylog\Models\Activity;

class ActivityController extends Controller
{
    public function activities()
    {
        $activities = Activity::with('user')->orderBy('id', 'desc')->get();
        return view('admin.activities.activity-logs', compact('activities'));
    }

    public function action($id)
    {
        $activity = Activity::with('user')
            ->where('id', $id)
            ->orderBy('id', 'desc')->firstOrFail();
        return view('admin.activities.action', compact('activity'));
    }
}
