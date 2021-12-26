<?php

namespace App\Http\Controllers\Admin\Menu;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\Menu\Menu;
use App\Models\Menu\Menufork;
use App\Models\Menu\ForkOption;
use App\Models\Menu\ForkOptionOption;
use Illuminate\Support\Facades\DB;
use App\Traits\Offertrait;
use App\Http\Requests\ForkRequest;

class MenuController extends Controller
{
    use Offertrait;
    public function index()
    {
        $menu = Menu::paginate(ADMIN_PAGINATE);
        return view("admin.menu.view.index", compact("menu"));
    }
    public function getfork()
    {
        $fork = Menufork::with(["menu" => function($q){
            $q->select("name", 'id');
        }])->paginate(ADMIN_PAGINATE);
        return view("admin.menu.view.fork", compact("fork"));
    }
    public function forks_fork()
    {
        $fork = ForkOption::with(["menu_fork" => function($q){
            $q->select("name", 'id');
        }])->paginate(ADMIN_PAGINATE);
        return view("admin.menu.view.forks_fork", compact("fork"));
    }
    public function forks_forks_fork()
    {
        $fork = ForkOptionOption::with(["forkoption" => function($q){
            $q->select("name", 'id');
        }])->paginate(ADMIN_PAGINATE);
        return view("admin.menu.view.forks_fork", compact("fork"));
    }

    //add templetes
    public function add()
    {
        return view("admin.menu.add.add");
    }

    public function add_fork()
    {
        $menu = Menu::get();
        return view("admin.menu.add.fork", compact("menu"));
    }

    public function add_forks_fork()
    {
        $fork = Menufork::get();
        return view("admin.menu.add.fork", compact("fork"));
    }

    public function add_forks_forks_fork()
    {
        $fork_option = ForkOption::get();
        return view("admin.menu.add.fork", compact("fork_option"));
    }


    //add post data
    public function add_data(ForkRequest $data, $table)
    {
        if($table == "menu"){
            $query = ["name" => $data->name];
        }else{
            $rows = [
                "menu_forks" => "menu_id",
                "forks_options" => "fork_id",
                "forks_option_option" => "option_id"
            ];
            $row = $rows[$table];
            $content = $this->filter_text($data->content);
            if(isset($data->file)){
                $filename = $this->saveimage($data->file, 'data/menu_files', 'file');
                $query = [
                    "name" => $data->name,    
                    "file" => $filename,
                    'content' => $content,
                    $row => $data->menu
                ];
            }else{
                $query = [
                    "name" => $data->name,    
                    'content' => $content,
                    $row => $data->menu
                ];
            }
            
        }

        $status = DB::table($table)->insert($query);
        
        if($status == 1){
            return redirect()->back()->with('success', 'تمت الإضافة بنجاح');
        }else{
            return redirect()->back()->with('error', 'فشل فى الإضافة');
        }
    }

    //posts
    
}
