<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\View;
use Illuminate\Support\Facades\Auth;
use App\Models\User;

class Home extends Controller
{

    public function login()
    {
        return view('front/login');
    }

    public function register()
    {
        return view('front/register');
    }

    public function register_user(Request $request)
    {
        return $request;
    }

    public function logout(Request $request)
    {
        Auth::logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return redirect()->back();
    }

    public function login_accept(Request $data)
    {
        if(Auth::guard('web')->attempt(['email' => $data->email, 'password' => $data->password])){
            return redirect()->intended(default: '/profile');
        }else{
            return redirect()->back()->with('error', 'Your E-mail or password isn\'t correct');
        }
    }

    public function user_check($email)
    {
        $array = User::where("email", "=", $email . "@consulta.com")->get();

        if(count($array) > 0){
            $status = "false";
        }else{
            $status = "true";
        }

        return response()->json([
            "status" => $status
        ]);
    }


    public function home()
    {
        return view('front/home');
    }

    public function test()
    {
        $data = getimagesize("images/posts/d21e98bf42fae8599bafaff38d2ec18c6d953c30consulta_0.jpg");
        return $data;
    }
}
