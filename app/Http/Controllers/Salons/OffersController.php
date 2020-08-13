<?php

namespace App\Http\Controllers\Salons;

use App\Http\Controllers\Controller;
use App\Product;
use App\Service;
use Illuminate\Http\Request;
use phpDocumentor\Reflection\Type;

class OffersController extends Controller
{
    public $objectName;
    public $folderView;
    public $flash;

    public function __construct()
    {
        $this->middleware('auth');
        $this->folderView = 'salon.offers.';
        $this->flash = 'Offers Data Has Been ';

    }

    public function index()
    {
        $products = Product::where('salon_id', auth()->user()->id)->where('price_after', '!=', null)->get();
        $services = Service::where('salon_id', auth()->user()->id)->where('price_after', '!=', null)->get();
        return view($this->folderView . 'offers', compact('services', 'products'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function update($id, $type)
    {
        $input['price_after'] = null;

        if ($type == 'product') {
            Product::findOrFail($id)->update($input);
        } else {
            Service::findOrFail($id)->update($input);
        }
        session()->flash('success', trans('admin.deleteSuccess'));
        return redirect(url('offers'));
    }

    public function deleteOffer($id, $type)
    {
        $input['price_after'] = null;

        if ($type == 'product') {
            Product::findOrFail($id)->update($input);
        } else {
            Service::findOrFail($id)->update($input);
        }
        session()->flash('success', trans('admin.deleteSuccess'));
        return redirect(url('offers'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {

    }
}
