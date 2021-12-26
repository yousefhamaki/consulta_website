<?php

namespace App\Http\Controllers\Front\we;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class We extends Controller
{
    public function make_report()
    {
        return view("front.we.report");
    }

    public function privacy()
    {
        return view("front.we.privacy");
    }
}
