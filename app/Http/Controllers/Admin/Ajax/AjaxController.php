<?php

namespace App\Http\Controllers\Admin\Ajax;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Offer;
use App\Http\Requests\OfferRequest;
use App\Traits\Offertrait;

class AjaxController extends Controller
{
    use Offertrait;
    public function create()
    {
        return view('ajaxoffer.offers');
    }
    public function upload(OfferRequest $data)
    {
        if($data->photo !== null){
            $filename = $this->saveimage($data->photo, 'images/offers', 'offer_1');
        }else{
            $filename = null;
        }
        
        // return $data;
        $offerSave = Offer::insert([
            'name' => $data-> name,
            'price' => $data-> price,
            'photo' => $filename,
        ]);
        // return 'true';
        if($offerSave)
            return response()->json([
                'status' => true,
                'msg' => trans(key: "messages.offer_success" )
            ]);
        else
            return response()->json([
                'status' => false,
                'msg' => 'فشل الحفظ برجاء المحاوله فى وقت لاحق'
            ]);
    }
    public function getoffers()
    {
        $offers = Offer::select('id', 'name', 'price', 'photo')->paginate(10);
        return view('ajaxoffer.getoffer', compact('offers'));
    }
    public function removeoffer(Request $id)
    {
        $offers = Offer::find($id->id);
        if($offers){
            $offers->delete();
            return response()->json([
                'status' => true,
                'msg' => "تم حذف العرض بنجاح"
            ]);
        }else{
            return false;
        }
    }
}
