<?php

namespace App\Http\Controllers\Admin\Law;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Law;
use App\Traits\Offertrait;

class Laws extends Controller
{
    use Offertrait;
    public function index()
    {
        $laws = Law::select("id", "law_name")->paginate(ADMIN_PAGINATE);
        return view('admin.law.index', compact('laws'));
        // return $laws;
    }
    public function add()
    {
        return view('admin.law.add');
    }
    public function addLaw(Request $data)
    {

        if($data->file !== null){
            $filename = $this->saveimage($data->file, 'data/law', 'law');
        }else{
            return redirect()->back()->with('error', 'ملف القانون مطلوب');
        }
        $content = $this->filter_text($data->content);

        $status = Law::insert([
            "law_name" => $data->law,
            "content" => $content,
            "file" => $filename,
        ]);
        if($status){
            return redirect()->back()->with('success', 'تم إضافة القانون');
        }else{
            return redirect()->back()->with('error', 'فشل إضافة القانون');
        }
    }
    public function edit($id)
    {
        return view('admin.law.edit');
    }
}
