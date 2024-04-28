<?php

namespace App\Http\Controllers;

use App\Models\Transaction;
use App\Trait\ApiTrait;
use Illuminate\Http\Request;

class TransactionController extends Controller
{
    use ApiTrait;

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return $this->success("Succcess get all transaction", [
            'transactions' => Transaction::with(['customer', 'user'])->get(),
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // validate
        $data = $this->validateRequest($request, [
            'customer_id' => 'required|exists:customer,id'
        ]);

        $data['user_id'] = auth()->user()->id;
        $data['date'] = now();

        $transaction = Transaction::create($data);
    }

    /**
     * Display the specified resource.
     */
    public function show(Transaction $transaction)
    {
        return $this->success("Succcess get all transaction", [
            'transactions' => $transaction->load(['customer', 'user', 'details'])
        ]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Transaction $transaction)
    {
        $transaction->delete();
        return $this->success("Succcess delete transaction");
    }
}
