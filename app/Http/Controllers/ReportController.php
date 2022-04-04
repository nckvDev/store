<?php

namespace App\Http\Controllers;

use App\Models\Stock;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ReportController extends Controller
{
    //
    public function report()
    {
        $stocks_count = DB::table('stocks')->count();
        $stocks_sum = DB::table('stocks')->where('stock_amount', '>', 0)->sum('stock_amount');
        $stocks_defective = DB::table('stocks')->where('defective_stock', '>', 0)->sum('defective_stock');
        $stocks_can = $stocks_sum - $stocks_defective;
        // dump($stocks_count,$stocks_sum, $defectives_sum);
        $devices_count = DB::table('devices')->count();
        $devices_sum = DB::table('devices')->where('device_amount', '>', 0)->sum('device_amount');
        $devices_defective = DB::table('devices')->where('defective_device', '>', 0)->sum('defective_device');
        $devices_can = $devices_sum - $devices_defective;
        return view('admin.report.index', compact('stocks_sum', 'stocks_count', 'stocks_defective', 'stocks_can', 'devices_count', 'devices_sum', 'devices_defective', 'devices_can'));
    }
}
