<?php

namespace App\Http\Controllers;

use App\Models\Customer;
use App\Trait\ApiTrait;
use Illuminate\Http\Request;

class CustomerController extends Controller
{

    use ApiTrait;

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return $this->success('Success get all customer', [
            'customers' => Customer::all(),
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // validate
        $data = $this->validateRequest($request, [
            'name' => 'required',
            'phone' => 'required',
            'address' => 'string'
        ]);

        $customer = Customer::create($data);

        return $this->success('Success create customer', [
            'customer' => $customer
        ]);
    }

    /**
     * Display the specified resource.
     */
    public function show(Customer $customer)
    {
        return $this->success('Success get customer', [
            'customer' => $customer
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Customer $customer)
    {
        // validate
        $data = $this->validateRequest($request, [
            'name' => 'required',
            'phone' => 'required',
            'address' => 'string'
        ]);

        $customer->update($data);

        return $this->success('Success update customer', [
            'customer' => $customer
        ]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Customer $customer)
    {
        
        $customer->delete();
        return $this->success('Success delete customer');
    }
}
