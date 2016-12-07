<?php

namespace App\Http\Controllers;

use App\Models\Time;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Vinkla\Hashids\Facades\Hashids;


class TimerController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('timer.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $targetDate = null;

        if($request->has('datetime')) {
            $this->validate($request, [
                'datetime' => 'required|date_format:Y-m-d H:i:s'
            ]);

            $targetDate = Carbon::parse($request->input('datetime'));

        } else {
            $this->validate($request, [
                'time-days'     => 'required|numeric|digits_between:0,99',
                'time-hours'    => 'required|numeric|digits_between:0,23',
                'time-minutes'  => 'required|numeric|digits_between:0,59',
                'time-seconds'  => 'required|numeric|digits_between:0,59',
            ]);

            $targetDate = Carbon::now()
                ->addDays($request->input('time-days'))
                ->addHours($request->input('time-hours'))
                ->addMinute($request->input('time-minutes'))
                ->addSeconds($request->input('time-seconds'));
        }

        $time = new Time();
        $time->target = $targetDate;
        $time->save();

        $id = Hashids::encode($time->id);

        return redirect()->route('timer.show', $id);
    }


    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $realId = Hashids::decode($id)[0];
        $time = Time::find($realId);

        return view('timer.countdown')->with(['time' => $time]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
