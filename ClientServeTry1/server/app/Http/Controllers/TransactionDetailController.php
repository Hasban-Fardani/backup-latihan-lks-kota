<?php

namespace App\Http\Controllers;

use App\Models\Sparepart;
use App\Models\Transaction;
use App\Models\TransactionDetail;
use App\Trait\ApiTrait;
use Illuminate\Http\Request;

class TransactionDetailController extends Controller
{
    use ApiTrait;

    /**
     * Display a listing of the resource.
     */
    public function index(Transaction $transaction)
    {
        return $this->success('Success get all details', [
            'transaction_details' => $transaction->details()->get()
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request, Transaction $transaction)
    {
        // validate
        $validatedRequest = $this->validateRequest($request, [
            'values' => 'required|array',
            'values.*.sparepart_id' => 'required|exists:spareparts,id',
            'values.*.qty' => 'required|integer'
        ]);

        $tmp = $validatedRequest['values'];
        $sparepart_ids = collect($tmp)->pluck('sparepart_id');
        $spareparts = Sparepart::whereIn('id', $sparepart_ids)->get();
        
        $data = [];
        for ($i = 0; $i < count($tmp); $i++) 
        {
            $data[$i]['sparepart_id'] = $tmp[$i]['sparepart_id']; 
            $data[$i]['transaction_id'] = $transaction->id;
            $data[$i]['qty'] = $tmp[$i]['qty']; 
            $data[$i]['subtotal'] = $tmp[$i]['qty'] * $spareparts[$i]->price; 
            $transaction->total += $data[$i]['subtotal'];
        }

        $details = $transaction->details()->createMany($data);
        $transaction->save();
        return $this->success('success store details',[
            'transaction_details' => $details
        ]);
    }

    /**
     * Display the specified resource.
     */
    public function show(TransactionDetail $transactionDetail)
    {
        return $this->success('Success get detail', [
            'transaction_detail' => $transactionDetail
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Transaction $transaction, TransactionDetail $transactionDetail)
    {
        // validate
        $data = $this->validateRequest($request, [
            'sparepart_id' => 'required|exists:spareparts,id',
            'qty' => 'required|min:1',
        ]);

        $transactionDetail->update($data);

        return $this->success('Success update detail', [
            'transaction_detail' => $transactionDetail
        ]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(TransactionDetail $transactionDetail)
    {
        $transactionDetail->delete();
        return $this->success('Success delete transaction detail');
    }
}
