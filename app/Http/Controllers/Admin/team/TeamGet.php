<?php

namespace App\Http\Controllers\admin\team;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Team;
use App\Http\Requests\TeamRequest;
use Illuminate\Support\Facades\Hash;
use App\Models\NotificationA;
use App\Models\Admins;
use Illuminate\Support\Facades\Auth;

class TeamGet extends Controller
{
    public function index()
    {
        $team = Team::paginate(ADMIN_PAGINATE);
        return view("admin.team.index", compact("team"));
    }

    public function register()
    {
        return view("admin.team.register");
    }
    public function registerpost(TeamRequest $data)
    {
        $password = hash('sha256', $data->password);
        $options = json_encode($data->option);
        $status = Team::insert([
            "name" => $data->name,
            "email" => $data->email,
            "password" => $password,
            "options" => $options,
            "salary" => $data->salary,
            "job_title" => $data->job_title,
        ]);
        if($status){
            $admins = Admins::select("id")->get();
            $user = Auth::guard('admin')->user()->id;
            $name = Auth::guard('admin')->user()->name;
            $type = 3;
            $notification_message = $name . " added a new officer called '" . $data->name . "' in consulta team";
            foreach($admins as $d){
                NotificationA::insert([
                    'from_id' => $user,
                    'to_id' => $d->id,
                    'type' => $type,
                    'notification' => $notification_message,
                    'rank_from' => 2
                ]);
            }
            return redirect()->back()->with('success', 'تم إضافة الموظف يمكنك تفعيله من الأن');
        }else{
            return redirect()->back()->with('error', 'فشل إضافة الموظف');
        }
    }
}
