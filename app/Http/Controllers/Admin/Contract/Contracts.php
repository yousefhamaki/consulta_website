<?php

namespace App\Http\Controllers\Admin\Contract;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Contract;
use App\Models\ContractHeader;
use App\Models\ContractSection;

class Contracts extends Controller
{
    public function index()
    {
        $contracts = Contract::with(["ContractHeader" => function($q){
            $q->select('name', 'id');
        }])->paginate(ADMIN_PAGINATE);
        return view('admin.contract.index', compact('contracts'));
    }

    public function branch()
    {
        $contracts = ContractHeader::with(["ContractSection" => function($q){
            $q->select('section', 'id');
        }])->paginate(ADMIN_PAGINATE);
        return view('admin.contract.headers', compact('contracts'));
    }

    public function section()
    {
        $contracts = ContractSection::paginate(10);
        return view('admin.contract.sections', compact('contracts'));
    }

    
    
}
