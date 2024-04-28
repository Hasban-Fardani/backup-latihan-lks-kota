<?php

namespace App\Trait;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

trait ApiTrait
{
    public function validateRequest(Request $request, array $rules)
    {
        $validator = Validator::make($request->all(), $rules);

        if ($validator->fails())
        {
            abort(response()->json([
                'message' => 'Invalid fields',
                'errors' => $validator->errors()
            ], 422));
        }

        return $validator->validated();
    }

    public function success($mesasge, $data = [])
    {
        $data = array_merge([
            'message' => $mesasge
        ], $data);

        return response()->json($data, 200);
    }
}