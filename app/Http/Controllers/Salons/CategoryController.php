<?php

namespace App\Http\Controllers\Salons;

use App\Category;
use App\Http\Controllers\Controller;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

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
        $categories = Category::where('salon_id',Auth::user()->id)->get();
        return view($this->folderView.'categories',\compact('categories'));

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
        $data = $this->validate(\request(),
            [
                'image' => 'sometimes|nullable|image|mimes:jpg,jpeg,png,gif,bmp',
                'name' => 'required|unique:categories',
                'type' => 'required|in:product,service',

            ]);

        if ($request['image'] != null) {
            // This is Image Information ...
            $file = $request->file('image');
            $name = $file->getClientOriginalName();
            $ext = $file->getClientOriginalExtension();

            // Move Image To Folder ..
            $fileNewName = 'img_' . time() . '.' . $ext;
            $file->move(public_path('uploads/categories'), $fileNewName);


            $data['image'] = $fileNewName;

        }
        $data['salon_id'] = Auth::user()->id;
        $cat = Category::create($data);
        $cat->save();
        session()->flash('success', trans('admin.addedsuccess'));
        return redirect(url('categories'));


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
        $user_data = Category::where('id', $id)->first();
        return view($this->folderView.'editCategory', \compact('user_data'));
    }

    public function update(Request $request, $id)
    {
        $data = $this->validate(\request(),
            [
                'image' => 'sometimes|nullable|image|mimes:jpg,jpeg,png,gif,bmp',
                'name' => 'required|unique:categories,name,'.$id,
                'type' => 'required|in:product,service',

            ]);

        if ($request['image'] != null) {
            // This is Image Information ...
            $file = $request->file('image');
            $name = $file->getClientOriginalName();
            $ext = $file->getClientOriginalExtension();

            // Move Image To Folder ..
            $fileNewName = 'img_' . time() . '.' . $ext;
            $file->move(public_path('uploads/categories'), $fileNewName);


            $data['image'] = $fileNewName;

        }
//        $data['salon_id'] = Auth::user()->id;
        $cat = Category::where('id',$id)->update($data);
//        $cat->save();
        session()->flash('success', trans('admin.updatSuccess'));
        return redirect(url('categories'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $cat = Category::where('id', $id)->first();
        $cat->delete();
        session()->flash('success', trans('admin.deleteSuccess'));
        return redirect(url('categories'));

    }
}
