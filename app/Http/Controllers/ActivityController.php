<?php

namespace App\Http\Controllers;

use App\Activity;
use App\Goal;
use App\Http\Requests\ActivityRequest;
use Illuminate\Http\Request;

class ActivityController extends Controller
{

    public function __construct(){
        $this->middleware('auth');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Goal $goal)
    {
        return view('activity.create', [
            'goal' => $goal
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(ActivityRequest $request, Goal $goal)
    {
        $activity = new Activity();
        $activity->name = $request->get('activityName');
        $activity->date = $request->get('activityDate');
        $activity->status = $request->get('activityStatus');
        $activity->priority = $request->get('activityPriority');
        
        $activity->goal_id = $goal->id;

        $activity->save();

        return redirect("/goals/{$goal->id}");
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Activity  $activity
     * @return \Illuminate\Http\Response
     */
    public function show(Activity $activity)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Activity  $activity
     * @return \Illuminate\Http\Response
     */
    public function edit(Goal $goal, Activity $activity)
    {
        return view('activity.edit', [
            'goal' => $goal,
            'activity' => $activity
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Activity  $activity
     * @return \Illuminate\Http\Response
     */
    public function update(ActivityRequest $request, Goal $goal, Activity $activity)
    {
        $activity->name = $request->get('activityName');
        $activity->date = $request->get('activityDate');
        $activity->status = $request->get('activityStatus');
        $activity->priority = $request->get('activityPriority');

        $activity->save();

        return redirect("/goals/{$goal->id}");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Activity  $activity
     * @return \Illuminate\Http\Response
     */
    public function destroy(Goal $goal,Activity $activity)
    {
        $activity->delete();

        return back();
    }
}
