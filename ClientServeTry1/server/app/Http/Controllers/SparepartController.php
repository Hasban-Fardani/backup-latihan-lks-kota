<?php

namespace App\Http\Controllers;

use App\Models\Sparepart;
use App\Trait\ApiTrait;
use Illuminate\Http\Request;

class SparepartController extends Controller
{

    use ApiTrait;

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return $this->success('Success get all sparepart',[
            'spareparts' => Sparepart::with(['category'])->get()
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
            'stock' => 'required|integer',
            'price' => 'required|integer',
            'category_id' => 'required|exists:categories,id'
        ]);

        $sparepart = Sparepart::create($data);

        return $this->success('Success create new sparepart', [
            'sparepart' => $sparepart
        ]);
    }   

    /**
     * Display the specified resource.
     */
    public function show(Sparepart $sparepart)
    {
        return $this->success('Success all sparepart',[
            'sparepart' => $sparepart
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Sparepart $sparepart)
    {
        // validate
        $data = $this->validateRequest($request, [
            'name' => 'required',
            'stock' => 'required|integer',
            'price' => 'required|integer',
            'category_id' => 'required|exists:categories,id'
        ]);

        $sparepart->update($data);

        return $this->success('Success update sparepart', [
            'sparepart' => $sparepart
        ]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Sparepart $sparepart)
    {
        $sparepart->delete();
        return $this->success('Success delete sparepart');
    }
}
