<?php

namespace App\Http\Controllers\Admin\Partitions;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Menu\Partition;
use App\Models\Menu\Menufork;

use Illuminate\Support\Facades\DB;
use App\Traits\Offertrait;

class Partitions extends Controller
{
    use Offertrait;

    public function index()
    {
        $partitions = Partition::get();
        return view("admin.partitions.index", compact('partitions'));
    }
    public function connect($id)
    {
        $partition = Partition::where("id", "=", $id)->get();

        $elements = Menufork::with(["menu" => function($q){
            $q->select("name", 'id');
        }])->get();

        // return $elements;
        return view("admin.partitions.connect", compact('partition', 'elements'));
    }

    public function add()
    {
        return view("admin.partitions.add");
    }

    public function edit($id)
    {
        $partition = Partition::where("id", "=", $id)->get();
        return view("admin.partitions.edit", compact("partition"));
    }

    public function add_data(Request $data)
    {
        $filename = $this->saveimage($data->img, 'images/partitions', 'partition_image');

        $status = Partition::insert([
                    "name" => $data->name,
                    "img" => $filename
                ]);
        if($status){
            return redirect()->back()->with('success', 'تمت الإضافة بنجاح');
        }else{
            return redirect()->back()->with('error', 'فشل فى الإضافة');
        }
    }

    public function connect_post(Request $data)
    {
        $connection = [];
        foreach($data->connection as $d){
            $connection[] = [ "id" => $d];
        }
        $final = json_encode($connection);
        $partition = Partition::where("id", "=", $data->id)->update(["connect" => $final]);

        if($partition == 1){
            return redirect()->back()->with('success', 'تم الربط بنجاح');
        }else{
            return redirect()->back()->with('error', 'فشل فى الربط');
        }
        
    }

    public function edit_data(Request $data, $id)
    {
        $filename = $this->saveimage($data->img, 'images/partitions', 'partition_image');

        $status = Partition::where("id", "=", $data->id)->update([
                    "name" => $data->name,
                    "img" => $filename
                ]);
        if($status){
            return redirect()->back()->with('success', 'تم التعديل بنجاح');
        }else{
            return redirect()->back()->with('error', 'فشل فى التعديل');
        }
    }
}
