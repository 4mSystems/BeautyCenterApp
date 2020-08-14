<?php

namespace App\Http\Controllers\Salons;

use App\Http\Controllers\Controller;
use App\Image;
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

    public function create()
    {
        return view($this->folderView.'createProducts');
    }

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
        $user_data = Product::where('id', $id)->first();
        return view($this->folderView.'offerProducts', \compact('user_data'));

    }

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

    public function showProductImage($id)
    {
        $productImage = Image::where('product_id',$id)->get();
        $product_id = $id ;

        return view($this->folderView.'product_images',compact('productImage','product_id'));
    }

    public function MoveImage($request_file)
    {
        $file = $request_file;
        $name = $file->getClientOriginalName();
        $ext = $file->getClientOriginalExtension();
        // Move Image To Folder ..
        $fileNewName = 'img_' . time() . '.' . $ext;
        $file->move(public_path('uploads/product/Detailimage'), $fileNewName);

        return $fileNewName;
    }

    public function storeProductImage(Request $request,$id){

        $request->validate([
            'image' => 'required',
        ]);

        $input = $request->all();

        foreach ($input['image'] as $ima) {
            # code...
            $gallery['image'] = $this->MoveImage($ima);
            $gallery['product_id'] = $id;

            Image::create($gallery);
        }


        return redirect()->back()->with('success',trans('admin.addedsuccess'));

    }
    public function destroyProductImage(Request $request)
    {

        $request->validate([
            'deleteImages' => 'required',
        ]);

        $input = $request->all();

        foreach ($input['deleteImages'] as $image_id) {

            image::find($image_id)->delete();

        }


        return redirect()->back()->with('success',trans('admin.deleteSuccess'));

    }

}
