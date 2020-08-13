<?php

namespace App\Http\Controllers\Salons;

use App\Reservation;
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

        $reservations = $this->objectName::where('salon_id', auth()->user()->id)->get();
        return view($this->folderView . 'reservations', compact('reservations'));
    }

    public function getReservationByStatus($status)
    {
        session()->put('reser_status', $status);

        $reservations = $this->objectName::where('salon_id', auth()->user()->id)->where('status', $status)->get();

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
        $data = $this->objectName::findOrFail($id)->update($input);
        if ($data) {
            session()->flash('success', trans('admin.statuschanged'));
        } else {
            session()->flash('danger', trans('admin.not_found'));

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
