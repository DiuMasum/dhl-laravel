<?php

namespace App\Http\Controllers;

use App\Models\FabricInfo;
use App\Models\FabricProcessFlow;
use App\Models\Trims;
use Illuminate\Http\Request;

class BreakdowninfoController extends Controller
{
    public function index(){
        $fabric_infos = FabricInfo::with(['purchaseOrder', 'buyer'])->get();
        $trims = Trims::all();
        $fabric_process_flows = FabricProcessFlow::with(['purchaseOrder', 'Buyers'])->get();

        return view('breakdown_info.index', compact('fabric_infos', 'trims', 'fabric_process_flows'));
    }
}
