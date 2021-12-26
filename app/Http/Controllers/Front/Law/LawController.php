<?php

namespace App\Http\Controllers\Front\Law;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\Law\Law;

class LawController extends Controller
{
    public function index()
    {
        $law = Law::select("id", "law_name")->orderBy("law_name", "ASC")->paginate(ADMIN_PAGINATE);

        return view("front.Law.index", compact("law"));
    }
    public function show($id)
    {
        $law = Law::where("id", "=", $id)->get();

        return view("front.Law.show", compact("law"));
    }
    public function search()
    {
        $text = $_GET['search'];

        $search = Law::select("id", "law_name")->where("law_name", "like", "%" . $text . "%")->limit(30)->get();
        return $search;
    }
}
