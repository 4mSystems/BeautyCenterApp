<?php

namespace App\Http\Controllers\Salons;

use App\Http\Controllers\Controller;
use App\Product;
use App\Service;
use App\Sponsered_ads;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class SponserAdsSalonController extends Controller
{
    public $objectName;
    public $folderView;
    public $flash;



    public function __construct(Sponsered_ads $model)
    {
        $this->middleware('auth');
        $this->objectName = $model;
        $this->folderView = 'salon.products.';
        $this->flash = 'Category Data Has Been ';

    }
    public function index()
    {
        $Sponsered_ads = Sponsered_ads::where('salon_id',Auth::user()->id)->get();
        return view('salon.product_ads.sponsers_ads',compact('Sponsered_ads'));

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
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request,$id,$type)
    {


        $data = $this->validate(\request(),
            [
                'period' => 'required|numeric',
            ]);

        if($type == 'product'){
            $data['product_id'] = $id;

        }elseif ($type == 'service'){
            $data['service_id'] = $id;
        }
        $Salon_id = Auth::user()->id;
        $data['salon_id'] = $Salon_id;
        $data['payment_amount'] = '0';
        $data['payment_info'] = 'Master Card';
        $data['status'] = 'waiting';

        $spons = Sponsered_ads::create($data);
        $spons->save();
        session()->flash('success', trans('admin.adsAddedSuccess'));
        return redirect(url('products'));

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id,$type)
    {
        $selectedProduct = Product::where('id', $id)->first();
        $page_type =$type;

        $sponser_ad =Sponsered_ads::where('salon_id', $id)->first();
         if ($sponser_ad == null){
             return view($this->folderView.'productAdSponser', \compact('selectedProduct','page_type'));
         }else{
             session()->flash('success', trans('admin.adsExisting'));
             return redirect(url('products'));
         }

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $sponser_data = Sponsered_ads::where('id', $id)->first();
        return view('salon.product_ads.editProductSponser', \compact('sponser_data'));
    }


    public function update(Request $request, $id)
    {
        $data = $this->validate(\request(),
            [
                'period' => 'required',

            ]);

        $cat = Sponsered_ads::where('id',$id)->update($data);
        session()->flash('success', trans('admin.updatSuccess'));
        return redirect(url('sponser_ads'));

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $pro = Sponsered_ads::where('id', $id)->first();
        $pro->delete();
        session()->flash('success', trans('admin.deleteSuccess'));
        return redirect(url('sponser_ads'));
    }
}
