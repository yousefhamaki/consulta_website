<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\PostRequest;
use App\Models\User;
use App\Models\Admins;
use App\Models\Post;
use App\Models\Report;
use Auth;
use App\Traits\Offertrait;
use Illuminate\Support\Facades\Hash;

class Admin extends Controller
{
    use Offertrait;
    public function login()
    {
        $type = "admin";
        return view("team.login", compact("type"));
    }
    public function index()
    {
        return view('admin.dashboard');
    }
    public function logincheck(Request $data)
    {
        if(Auth::guard('admin')->attempt(['email' => $data->email, 'password' => $data->password])){
            return redirect()->intended(default: MANAGE . '/dashboard');
        }else{
            return back()->withInput($data->only(keys: 'email'));
        }
    }
    public function users()
    {
        $users = User::paginate(ADMIN_PAGINATE);
        return view('admin.users', compact('users'));
    }
    
    //reports
    public function reports()
    {
        $reports = Report::with(["user" => function($q){
            $q->select('f_name', 'id');
        }])->paginate(ADMIN_PAGINATE);

        return view('admin.reports', compact('reports'));
        // return  $reports;
    }
    public function reportAnswer($id)
    {
        return $id;
    }

    public function profile($id)
    {
        $page = "manage";
        $user = Admins::where("id", "=", $id)->get();
        return view("admin.profile", compact("user", "page"));
    }
}
