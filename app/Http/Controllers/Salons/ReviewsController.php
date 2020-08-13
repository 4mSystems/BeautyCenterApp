<?php

namespace App\Http\Controllers\Salons;

use App\Reviews;
use App\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ReviewsController extends Controller
{
    public $objectName;
    public $folderView;

    public function __construct(Reviews $model)
    {
        $this->middleware('auth');
        $this->objectName = $model;
        $this->folderView = 'salon.reservations.';

    }

    public function index()
    {
        return view($this->folderView . 'reviews');

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
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $data = $this->validate(\request(),
            [
                'comment' => 'required',
                'user_id' => 'required|exists:users,id',
            ]);
        $data['rate'] = '3';
        $this->objectName::create($data);
        session()->flash('success', trans('admin.addedsuccess'));
        return redirect(url('reviews/' . $request->user_id));


    }

    /**
     * Display the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $user = User::where('id', $id)->first();
        $reviews = Reviews::where('user_id', $id)->get();
        $totalReviews = Reviews::where('user_id', $id)->selectRaw('SUM(rate)/COUNT(user_id) AS avg_rating')->first()->avg_rating;
         return view($this->folderView . 'reviews', compact('user', 'reviews', 'totalReviews'));

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
