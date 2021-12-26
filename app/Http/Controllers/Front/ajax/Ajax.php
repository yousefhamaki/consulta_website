<?php

namespace App\Http\Controllers\Front\ajax;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\ConsultaRequest;
use App\Models\consulta_option;
use Illuminate\Support\Facades\Auth;
use App\Models\Consulta_form;
use Illuminate\Support\Facades\Hash;

class Ajax extends Controller
{
    public function consulta_option($option)
    {
        $data = consulta_option::where("id", "=", $option)->get();
        return view("Admin.consulta.ajax_option", compact("data"));
    }

    public function add_consulta(ConsultaRequest $req)
    {
        $consulta_id = Hash::make(sha1(time() . $req->name . $req->country . $req->_token));
        $status = Consulta_form::insert([
            'user_id' => Auth::user()->id,
            'consulta_id' => $consulta_id,
            'name' => $req->name,
            'age' => $req->age,
            'governorate' => $req->go,
            'country' => $req->country,
            'country_code' => $req->country_code,
            'phone' => $req->phone,
            'email' => $req->email,
            'consulta' => $req->consulta,
            'message' => $req->message,
            'service_id' => $req->service_id,
            'time' => $req->time,
        ]);
        if($status){
            return $status;
        }else{

        }
        
    }
}
