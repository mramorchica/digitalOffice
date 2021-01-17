<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\JobRequest;
use App\Models\Job;
use App\Models\Position;
use App\Models\Department;


class JobController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $jobs = Job::with(['position', 'department', 'responsibleUser'])->get();

        return view('jobs.index', [
            'jobs' => $jobs
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $positions = Position::all();
        $departments = Department::all();

        return view('jobs.create', [
            'positions' => $positions,
            'departments' => $departments,
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(JobRequest $request)
    {
        $validated = $request->validated();
        Job::create($validated);

        return redirect('jobs')->with('msg_success', 'Successfully added a new open position!');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Job $job)
    {
        return view('jobs.show');
    }

    public function showList()
    {
        $jobs = Job::with(['position', 'department', 'responsibleUser'])->get();

        return view('jobs.showList', [
            'jobs' => $jobs,
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Job $job)
    {
        $positions = Position::all();
        $departments = Department::all();

        return view('jobs.edit', [
            'job' => $job,
            'positions' => $positions,
            'departments' => $departments,
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(JobRequest $request, Job $job)
    {
        $validated = $request->validated();
        $job->update($validated);

        return redirect('jobs')->with('msg_warning', 'Successfully updated an open position!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Job $job)
    {
        $job->delete();

        return redirect('jobs')->with('msg_danger', 'Successfully deleted an open position!');
    }
}
