<?php

namespace App\Http\Controllers\Salons;

use App\Http\Controllers\Controller;
use App\Product;
use Illuminate\Http\Request;

class productsController extends Controller
{
    public $objectName;
    public $folderView;
    public $flash;



    public function __construct(Product $model)
    {
        $this->middleware('auth');
        $this->objectName = $model;
        $this->folderView = 'salon.products.';
        $this->flash = 'Category Data Has Been ';

    }
    public function index()
    {
//        $categories = Category::all();
//        \compact('categories')
        return view($this->folderView.'products');

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view($this->folderView.'createProducts');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
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
//        $cat = Category::where('id', $id)->first();
//        , \compact('cat')
        return view($this->folderView.'editProducts');
    }

    public function update(Request $request, $id)
    {
        //
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
