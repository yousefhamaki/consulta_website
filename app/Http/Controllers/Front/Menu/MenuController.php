<?php

namespace App\Http\Controllers\Front\Menu;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\Menu\Menu;
use App\Models\Menu\Menufork;
use App\Models\Menu\Partition;
use App\Models\consulta_option;

class MenuController extends Controller
{
    public function fork($id)
    {
        $fork = Menufork::where("id", "=", $id)->where("status", "=", "1")->get();
        return view("front/menu/fork", compact("fork"));
    }
    public function menu_show($id)
    {
        if($id == 2){
            $data = consulta_option::get();
            return view("front.menu.consulta_form", compact("data"));
        }else{
            return view("front.menu.consulta_form");
        }
    }

    public function partition_show($id)
    {
        $name = Partition::where("id", "=", $id)->get();
        foreach($name as $d){
            $options = $d->connect;
            $options = json_decode($options);
            $name_p = $d->name;
        }
        foreach($options as $d){
            $connect[] = $d->id;
        }
        $data = Menufork::whereIn("id", $connect)->get();
        return view("front.menu.partition", compact("name_p", "data"));
    }
}
