<?php

namespace App\Http\Controllers\Salons;

use App\Reservation;
use Carbon\Carbon;
use Carbon\CarbonInterval;
use DateInterval;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class productReservationController extends Controller
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

        $reservations = $this->objectName::where('salon_id', auth()->user()->id)->where('type','product')->simplePaginate(10);
        return view($this->folderView . 'reservationsProduct', compact('reservations'));
    }






    public function getReservationByStatus($status)
    {
        session()->put('reser_status', $status);

        $reservations = $this->objectName::where('salon_id', auth()->user()->id)->where('type','product')->where('status', $status)->paginate(10);

        return view($this->folderView . 'reservationsProduct', compact('reservations'));

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

            $data = $this->objectName::findOrFail($id)->update($input);
            session()->flash('success', trans('admin.statuschanged'));


        return redirect(url('productreservations'));

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
