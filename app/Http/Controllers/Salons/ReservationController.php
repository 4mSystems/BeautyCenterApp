<?php

namespace App\Http\Controllers\Salons;

use App\Reservation;
use Carbon\Carbon;
use Carbon\CarbonInterval;
use DateInterval;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ReservationController extends Controller
{
    public $objectName;
    public $folderView;

    public function __construct(Reservation $model)
    {
        $this->middleware('auth');
        $this->objectName = $model;
        $this->folderView = 'salon.reservations.';

    }

    public function index()
    {
        session()->put('reser_status', 'all');

        $reservations = $this->objectName::where('salon_id', auth()->user()->id)->simplePaginate(10);
        return view($this->folderView . 'reservations', compact('reservations'));
    }

    public function getReservationByStatus($status)
    {
        session()->put('reser_status', $status);

        $reservations = $this->objectName::where('salon_id', auth()->user()->id)->where('status', $status)->paginate(10);

        return view($this->folderView . 'reservations', compact('reservations'));

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
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
    public function edit($id, $status)
    {
        $input['status'] = $status;
        if ($status == 'canceled') {
            $today_date = Carbon::now();
            $today_string = $today_date->toDateString();
            $reserve = $this->objectName::where('id', $id)->first();
            if ($today_string == $reserve->date) {
//                dd($today_date->toTimeString());
                $time = date('H:i:s', strtotime($reserve->time));
                $time = (new Carbon($time))->toDateTime();

                $delay = $time->diff($today_date);
                $delay = $delay->format('%H:%i');
//
                $cancelTime = "02:00";
                $cancelTime = date('H:i:s', strtotime($cancelTime));
                $cancelTime = (new Carbon($cancelTime))->toDateTime();

                $cancelTime = $cancelTime->diff((new Carbon("00:00:00")));

                $cancelTime = $cancelTime->format('%H:%i');


                if ($delay >= $cancelTime) {
                    $data = $this->objectName::findOrFail($id)->update($input);
                    session()->flash('success', trans('admin.statuschanged'));
                    return redirect(url('reservations'));

                } else {
                    session()->flash('danger', trans('admin.CannotCancel'));
                    return redirect(url('reservations'));

                }
//
            } elseif ($today_string <= $reserve->date) {
                $data = $this->objectName::findOrFail($id)->update($input);
            }
        } else {
            $data = $this->objectName::findOrFail($id)->update($input);
            session()->flash('success', trans('admin.statuschanged'));

        }
        return redirect(url('reservations'));

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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
