<?php

namespace App\Http\Controllers\Salons;

use App\Category;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public $objectName;
    public $folderView;
    public $flash;



    public function __construct(Category $model)
    {
        $this->middleware('auth');
        $this->objectName = $model;
        $this->folderView = 'salon.categories.';
        $this->flash = 'Category Data Has Been ';

    }
    public function index()
    {
//        $categories = Category::all();
//        \compact('categories')
        return view($this->folderView.'categories');

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view($this->folderView.'createCategory');
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
        return view($this->folderView.'editCategory');
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
