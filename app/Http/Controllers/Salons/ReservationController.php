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

        return view($this->folderView . 'reservations');
    }

    public function create()
    {
        //
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
    public function edit($id)
    {
        //
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