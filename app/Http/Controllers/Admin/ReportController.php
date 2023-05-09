<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Order;

class ReportController extends Controller
{
    public function orders(Request $request){
    	$dataraw = Order::where('is_submitted' , 1);

    	$data = $dataraw->get();
                    
        return view('admin.Reports.order_summary' , [
                'data' => $data
            ]);
    }
}
