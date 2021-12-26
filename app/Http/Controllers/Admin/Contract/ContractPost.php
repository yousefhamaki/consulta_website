<?php

namespace App\Http\Controllers\Admin\Contract;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Contract;
use App\Models\ContractHeader;
use App\Models\ContractSection;

class ContractPost extends Controller
{
    //add contracts post
    public function addContract_data(Request $data)
    {
        $status = Contract::insert([
            'header_id' => $data->branch,
            'value' => $data->contract,
        ]);
        if($status){
            return redirect()->back()->with('success', 'تم إضافة العقد');
        }else{
            return redirect()->back()->with('error', 'فشل إضافة العقد');
        }
    }
    public function addBranch_data(Request $data)
    {
        $status = ContractHeader::insert([
            'section_id' => $data->section,
            'name' => $data->branch,
        ]);
        if($status){
            return redirect()->back()->with('success', 'تم إضافة الفرع');
        }else{
            return redirect()->back()->with('error', 'فشل إضافة الفرع');
        }
    }
    public function addSection_data(Request $data)
    {
        $status = ContractSection::insert([
            'section' => $data->section,
            'logo' => $data->logo,
        ]);
        if($status){
            return redirect()->back()->with('success', 'تم إضافة القسم');
        }else{
            return redirect()->back()->with('error', 'فشل إضافة القسم');
        }
    }


    //delete
    public function deleteContract($id)
    {
        $Contract = Contract::find($id);
        if($Contract){
            $Contract->delete();
            return redirect()->back()->with('success', 'تم حذف العقد');
        }else{
            return redirect()->back()->with('success', 'فشل حذف العقد');
        }
    }
    public function deleteSection($id)
    {
        // $Contract = Contract::find("header_id" => $id->id);
        // $ContractHeader = ContractHeader::find($id->id);
        // if($ContractHeader){
        //     $ContractHeader->delete();
        //     return response()->json([
        //         'status' => true,
        //         'msg' => "تم حذف القسم بنجاح"
        //     ]);
        // }else{
        //     return false;
        // }
    }
    public function deleteBranch($id)
    {
        $Contract = Contract::where("header_id", "=", $id)->delete();
        $ContractHeader = ContractHeader::find($id);
        if($ContractHeader){
            $ContractHeader->delete();
            return redirect()->back()->with('success', 'تم حذف الفرع');
        }else{
            return redirect()->back()->with('error', 'فشل فى حذف الفرع');
        }
    }

}