<?php

namespace App\Http\Controllers\Salons;

use App\Http\Controllers\Controller;
use App\Service;
use App\User;
use Illuminate\Http\Request;

class SalonUsersController extends Controller
{
    public $objectName;
    public $folderView;
    public $flash;

    public function __construct(Service $model)
    {
        $this->middleware('auth');
        $this->objectName = $model;
        $this->folderView = 'salon.salon_users';
        $this->flash = 'User Data Has Been ';

    }

    public function index()
    {
        $salon_users = User::where('added_by', auth()->user()->id)->simplePaginate(10);
        return view($this->folderView, compact('salon_users'));

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
        $user = User::where('id', $id)->first();
        if ($user->status == "active") {
            $user->status = "deactive";
            $user->save();
        } else {
            $user->status = "active";
            $user->save();

        }
        session()->flash('success', trans('admin.statuschanged'));

        return redirect(url('salonUsers'));
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
