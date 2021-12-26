<?php

namespace App\Http\Controllers\Admin\consulta;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\consulta_option;
use App\Traits\Offertrait;

class Consulta extends Controller
{
    use Offertrait;
    public function add_option()
    {
        return view("Admin.consulta.consulta_option_add");
    }

    public function add_option_post(Request $request)
    {

        $content = nl2br($request->details);
        $data_image = $request->img;
        $image = $this->saveimage($data_image, 'data/logo', 'option');

        $status = consulta_option::insert([
            "img" => $image,
            "name" => $request->name,
            "detais" => $content,
            "time" => $request->time,
        ]);
        if($status){
            return redirect()->back()->with('success', 'تم إضافة الخاصية');
        }else{
            return redirect()->back()->with('error', 'فشل إضافة الخاصية');
        }
    }
}
