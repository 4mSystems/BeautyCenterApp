<?php

namespace App\Http\Controllers\Salons;

use App\Http\Controllers\Controller;
use App\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

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
        $product = Product::where('salon_id',Auth::user()->id)->get();
//
        return view($this->folderView.'products',\compact('product'));

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
        $data = $this->validate(\request(),
            [
                'main_image' => 'sometimes|nullable|image|mimes:jpg,jpeg,png,gif,bmp',
                'name' => 'required|unique:products',
                'desc' => 'required',
                'price_after' => 'sometimes|nullable|numeric',
                'price_before' => 'required|numeric',
                'cat_id' => 'required|exists:categories,id',

            ]);

        if ($request['main_image'] != null) {
            // This is Image Information ...
            $file = $request->file('main_image');
            $name = $file->getClientOriginalName();
            $ext = $file->getClientOriginalExtension();

            // Move Image To Folder ..
            $fileNewName = 'img_' . time() . '.' . $ext;
            $file->move(public_path('uploads/product'), $fileNewName);


            $data['main_image'] = $fileNewName;

        }
        $Salon_id = Auth::user()->id;
        $data['salon_id'] = $Salon_id;
//        dd($data);
        $cat = Product::create($data);
        $cat->save();
        session()->flash('success', trans('admin.addedsuccess'));
        return redirect(url('products'));

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
        $user_data = Product::where('id', $id)->first();
        return view($this->folderView.'editProducts', \compact('user_data'));
    }

    public function update(Request $request, $id)
    {
        $data = $this->validate(\request(),
            [
                'main_image' => 'sometimes|nullable|image|mimes:jpg,jpeg,png,gif,bmp',
                'name' => 'required|unique:products,name,'.$id,
                'desc' => 'required',
                'price_after' => 'sometimes|nullable|numeric',
                'price_before' => 'required|numeric',
                'cat_id' => 'required|exists:categories,id',

            ]);

        if ($request['main_image'] != null) {
            // This is Image Information ...
            $file = $request->file('main_image');
            $name = $file->getClientOriginalName();
            $ext = $file->getClientOriginalExtension();

            // Move Image To Folder ..
            $fileNewName = 'img_' . time() . '.' . $ext;
            $file->move(public_path('uploads/product'), $fileNewName);


            $data['main_image'] = $fileNewName;

        }

        $cat = Product::where('id',$id)->update($data);
        session()->flash('success', trans('admin.addedsuccess'));
         return redirect(url('products'));

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $pro = Product::where('id', $id)->first();
        $pro->delete();
        session()->flash('success', trans('admin.deleteSuccess'));
        return redirect(url('products'));
    }
}
