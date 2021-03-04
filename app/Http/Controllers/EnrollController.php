<?php

namespace App\Http\Controllers;

use App\Enroll;
use App\Event;
use Illuminate\Http\Request;

class EnrollController extends Controller
{
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
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Event  $enroll
     * @param  \App\Enroll  $e
     * @return \Illuminate\Http\Response
     */
    public function show(Event $enroll,Enroll $e)
    {
        $test = Enroll::where([
            ['user_id',auth()->user()->id],
            ['event_id',$enroll->getAttribute('id')]
        ])
            ->get();
        if($test.value('')=='[]'){
            $enroll = new Enroll([
                'event_id' => $enroll->getAttribute('id'),
                'user_id' => auth()->user()->getAuthIdentifier('id')
            ]);
            $enroll->save();
            return redirect()->route('events.index')->with('status', 'Enrolled Successfully!');
        }else{
            $this->destroy($test[0]);
            return redirect()->route('events.index')->with('status', 'UnEnrolled Successfully!');
        }
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Enroll  $enroll
     * @return \Illuminate\Http\Response
     */
    public function edit(Enroll $enroll)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Enroll  $enroll
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Enroll $enroll)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Enroll  $enroll
     * @return \Illuminate\Http\Response
     */
    public function destroy(Enroll $enroll)
    {
        $enroll->delete();
        return redirect()->route('events.index',$enroll)->with('status', 'Enrollment Deleted Successfully!');
    }
}
