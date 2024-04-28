<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Sparepart;
use App\Models\Transaction;
use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class DashboardController extends Controller
{
    public function categories_analytics(){
        $category = Category::withCount('spareparts')->get();
        $count = $category->pluck('spareparts_count');
        $labels = $category->pluck('name');
        return response()->json([
            "labels" => $labels,
            "datasets" => [
                "data" => $count
            ]
        ], 200);
    }

    public function transactions_analytics(){
        $transaction = Transaction::groupBy('date')
            ->select('date', DB::raw('count(*) as total'))
            ->get();
        
        $labels = $transaction->pluck('date');
        $totals = $transaction->pluck('total');
        return response()->json([
            "labels" => $labels,
            "datasets" => [
                "data" => $totals
            ]
        ], 200);
    }

    public function transaction_invoice(Request $request, Transaction $transaction){
        $pdf = Pdf::loadView('transaction_invoice');
        
        if ($request->input('download')) 
        {
            return $pdf->download('transaction_invoice');
        }

        return $pdf->stream('transaction_invoice');
    }
}
