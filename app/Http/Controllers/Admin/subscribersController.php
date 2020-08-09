<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\package_detail;
use Illuminate\Http\Request;
use App\package;

class subscribersController extends Controller
{
    public $objectName;
    public $folderView;
    public $flash;


    public function __construct(package $model)
    {
        $this->middleware('auth');
        $this->objectName = $model;
        $this->folderView = 'managers.subscribers.';
        $this->flash = 'subscriber Data Has Been ';

    }

    public function index()
    {
        $data = $this->objectName::all();

        return view($this->folderView.'subscribers',compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view($this->folderView.'addSubscriber');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string',
            'price' => 'required|numeric',
            'period' => 'required|numeric',
        ]);

        $input = $request->all();

        $this->objectName::create($input);

        return redirect()->route('subscribers.index')->with('success',$this->flash.' Created');

    }

    public function show($id)
    {
        //
    }

    public function edit($id)
    {
        $data = $this->objectName::find($id);

        return view($this->folderView.'editSubscriber', compact('data'));
    }
    public function details($id)
    {
        $data = package_detail::where('package_id',$id)->get();
//        dd($data);
        return view('managers.detailesSubscriber.detailsSubscriber',compact('id','data'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'name' => 'required|string',
            'price' => 'required|numeric',
            'period' => 'required|numeric',

        ]);

        $input = $request->all();

        $this->objectName::find($id)->update($input);

        return redirect()->route('subscribers.index')->with('success',trans('admin.updated'));

    }

    public function destroy($id)
    {
        $this->objectName::where('id',$id)->delete();
        session()->flash('success', trans('Subscriber deleted successfully'));
        return redirect(url('subscribers'));
    }

}
