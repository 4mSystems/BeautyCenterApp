<?php

namespace App\Http\Controllers\Salons;

use App\Chair;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ChairsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $chairs = Chair::where('salon_id',Auth::user()->id)->simplePaginate(10);
        return view('salon.chairs.chairs',\compact('chairs'));

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('salon.chairs.createchairs');

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $data = $this->validate(\request(),
            [
                 'chair_name' => 'required|unique:chairs',
                 'desc' => 'required',

            ]);


        $data['salon_id'] = Auth::user()->id;
        $cat = Chair::create($data);
//        $cat->save();
        session()->flash('success', trans('admin.addedsuccess'));
        return redirect(url('chairs'));
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $user_data = Chair::where('id', $id)->first();
        return view('salon.chairs.editchairs', \compact('user_data'));


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
        $data = $this->validate(\request(),
            [
                 'chair_name' => 'required|unique:chairs,chair_name,'.$id,
                 'desc' => 'required',


            ]);

           Chair::where('id',$id)->update($data);
         session()->flash('success', trans('admin.updatSuccess'));
        return redirect(url('chairs'));

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $cat = Chair::where('id', $id)->first();
        $cat->delete();
        session()->flash('success', trans('admin.deleteSuccess'));
        return redirect(url('chairs'));

    }
}
