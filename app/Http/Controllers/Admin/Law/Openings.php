<?php

namespace App\Http\Controllers\Admin\Law;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Law\Opening;

class Openings extends Controller
{
    public function addForm()
    {
        return view("admin.law.opening.add");
    }
    public function Add(Request $data)
    {
        $status = Opening::insert([
            "law_id" => $data->law,
            "content" => $data->content
        ]);
        if($status){
            return redirect()->back()->with('success', 'تم إضافة الأفتتاحية');
        }else{
            return redirect()->back()->with('error', 'فشل إضافة الأفتتاحية');
        }
    }

}