<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use Illuminate\Http\Request;
use App\Models\Event;
use Illuminate\Support\Facades\Auth;
use Mdo\JitsiEvent\JitsiEvent;

class EventController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $events = Event::with('creator')->get();

        return view('events.index', ['events' => $events]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('events.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $data = $request->except('_token');
        $data['created_by'] = Auth::user()->id;
        $data['created_at'] = Carbon::now()->toDateTimeString();
        $data['link'] = JitsiEvent::createLink($data['title']);

        $newEvent = Event::insert($data);
        $message = 'Successfully inserted event !';

        return redirect()->route('events.index')->with('success', $message);
    }

    /**
     * Display the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $event = Event::find($id);

        return view('events.edit', ['event' => $event]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $data = $request->except('_token');
        $updateEvent = Event::find($id)->update($data);
        $message = 'Successfully inserted event !';

        return redirect()->route('events.index')->with('success', $message);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $event = Event::find($id);
        $event->delete();
        $message = 'Successfully deleted event!';

        return redirect()->back()->with('success', $message);
    }

    public function meet($meetCode)
    {
        $event = Event::where('link',$meetCode)->first();
        if($event->isPublic < 1){
            if(!Auth::user()){
                return redirect()->route('login');
            }
        }
        $userData = '';
        if(Auth::user()){
            $userData = Auth::user()->name;
        }

        return JitsiEvent::makeMeet($meetCode,$userData);
    }
}
