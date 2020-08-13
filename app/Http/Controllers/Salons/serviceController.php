<?php

namespace App\Http\Controllers\Salons;

use App\Http\Controllers\Controller;
use App\Service;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class serviceController extends Controller
{
    public $objectName;
    public $folderView;
    public $flash;



    public function __construct(Service $model)
    {
        $this->middleware('auth');
        $this->objectName = $model;
        $this->folderView = 'salon.services.';
        $this->flash = 'Services Data Has Been ';

    }
    public function index()
    {
        $services = Service::where('salon_id',Auth::user()->id)->get();
        return view($this->folderView.'services',compact('services'));

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view($this->folderView.'createService');
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
                'image' => 'sometimes|nullable|image|mimes:jpg,jpeg,png,gif,bmp',
                'name' => 'required|unique:services',
                'desc' => 'required',
                'time' => 'required',
                'price_after' => 'sometimes|nullable|numeric',
                'price_before' => 'required|numeric',
                'cat_id' => 'required|exists:categories,id',

            ]);

        if ($request['image'] != null) {
            // This is Image Information ...
            $file = $request->file('image');
            $name = $file->getClientOriginalName();
            $ext = $file->getClientOriginalExtension();

            // Move Image To Folder ..
            $fileNewName = 'img_' . time() . '.' . $ext;
            $file->move(public_path('uploads/services'), $fileNewName);


            $data['image'] = $fileNewName;

        }
        $Salon_id = Auth::user()->id;
        $data['salon_id'] = $Salon_id;
//        dd($data);
        $cat = Service::create($data);
        $cat->save();
        session()->flash('success', trans('admin.addedsuccess'));
        return redirect(url('services'));

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $user_data = Service::where('id', $id)->first();
        return view($this->folderView.'offerService',compact('user_data'));

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $user_data = Service::where('id', $id)->first();
        return view($this->folderView.'editService',compact('user_data'));
    }

    public function update(Request $request, $id)
    {
        $data = $this->validate(\request(),
            [
                'image' => 'sometimes|nullable|image|mimes:jpg,jpeg,png,gif,bmp',
                'name' => 'required|unique:services,name,'.$id,
                'desc' => 'required',
                'time' => 'required',
                'price_after' => 'sometimes|nullable|numeric',
                'price_before' => 'required|numeric',
                'cat_id' => 'required|exists:categories,id',

            ]);

        if ($request['image'] != null) {
            // This is Image Information ...
            $file = $request->file('image');
            $name = $file->getClientOriginalName();
            $ext = $file->getClientOriginalExtension();

            // Move Image To Folder ..
            $fileNewName = 'img_' . time() . '.' . $ext;
            $file->move(public_path('uploads/services'), $fileNewName);


            $data['image'] = $fileNewName;

        }
        $cat = Service::where('id',$id)->update($data);
        session()->flash('success', trans('admin.addedsuccess'));
        return redirect(url('services'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $ser = Service::where('id', $id)->first();
        $ser->delete();
        session()->flash('success', trans('admin.deleteSuccess'));
        return redirect(url('services'));
    }
}
