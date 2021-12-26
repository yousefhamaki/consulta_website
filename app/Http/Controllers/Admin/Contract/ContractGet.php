<?php

namespace App\Http\Controllers\Admin\Contract;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Contract;
use App\Models\ContractHeader;
use App\Models\ContractSection;

class ContractGet extends Controller
{
    //add contracts get
    public function addContract()
    {
        $sections = ContractHeader::get();
        return view('admin.contract.add.contract', compact("sections"));
    }
    public function addBranch()
    {
        $sections = ContractSection::get();
        return view('admin.contract.add.branch', compact("sections"));
    }
    public function addSection()
    {
        return view('admin.contract.add.section');
    }
}