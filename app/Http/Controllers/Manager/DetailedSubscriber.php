<?php

namespace App\Http\Controllers\Manager;

use App\Http\Controllers\Controller;
use App\package;
use App\package_detail;
use Illuminate\Http\Request;

class DetailedSubscriber extends Controller
{
    public $objectName;
    public $folderView;
    public $flash;


    public function __construct(package_detail $model)
    {
        $this->middleware('auth');
        $this->objectName = $model;
        $this->folderView = 'managers.detailesSubscriber.';
        $this->flash = 'subscriber Data Has Been ';

    }
    public function index(Request $request)
    {

    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string',
            'package_id' => 'required',
            'limit' => 'numeric',
        ]);

        $input = $request->all();
        $package_id =$input['package_id'];
        $this->objectName::create($input);

        return redirect()->back()->with('success', trans('admin. addedsuccess'));

    }

    public function show($id)
    {
        //
    }

    public function edit($id)
    {
        $data = $this->objectName::find($id);

        return view($this->folderView.'editSubscriberDetail', compact('data'));
    }

    public function update(Request $request, $Detail_id)
    {
        $request->validate([
            'name' => 'required|string',
            'limit' => 'required|numeric',
        ]);

        $input = $request->all();
        $package_id = $input['package_id'];
        $id=$package_id;

        $this->objectName::find($Detail_id)->update($input);

        $data = package_detail::where('package_id',$package_id)->get();

        session()->flash('success',trans('admin. updatSuccess'));
        return view('managers.detailesSubscriber.detailsSubscriber',compact('id','data'));
    }

    public function destroy($id)
    {
        $this->objectName::where('id',$id)->delete();
        return redirect()->back()->with('success', trans('admin.deleteSuccess'));
    }
}
