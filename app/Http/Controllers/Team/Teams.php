<?php

namespace App\Http\Controllers\Team;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
// use Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
use App\Models\Team;

class Teams extends Controller
{
    public function login()
    {
        $type = "team";
        return view("team.login", compact("type"));
    }
    public function logincheck(Request $data)
    {
        if(Auth::guard('team')->attempt(['email' => $data->email, 'password' => $data->password])){
            if(Auth::guard('team')->user()->status > 0){
                return redirect()->intended(default: 'admin/dashboard');
            }else{
                Auth::logout();
                $data->session()->invalidate();
                $data->session()->regenerateToken();
                return redirect()->back()->with('error', 'Your E-mail isn\'t active.  Please call your owner.');
            }
        }else{
            return redirect()->back()->with('error', 'Your E-mail or password isn\'t correct');
        }
    }

    public function dashboard()
    {
        return view("team.dashboard");
    }

    public function profile($id)
    {
        $page = "admin";
        $user = Team::where("id", "=", $id)->get();
        return view("team.profile", compact("user", "page"));
    }
}
