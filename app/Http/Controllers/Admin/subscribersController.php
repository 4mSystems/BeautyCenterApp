<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
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
            'price' => 'required|double',
            'period' => 'required|integer',
        ]);

        $input = $request->all();

        $this->objectName::create($input);

        return redirect()->route('subscribers.index')->with('success',$this->flash.' Created');

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
        $data = $this->objectName::find($id);

        return view($this->folderView.'editSubscriber', compact('data'));
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
        $request->validate([
            'name' => 'required|string',
            'price' => 'required|double',
            'period' => 'required|integer',

        ]);

        $input = $request->all();

        $this->objectName::find($id)->update($input);

        return redirect()->route('subscribers.index')->with('success',$this->flash.' Updated');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
