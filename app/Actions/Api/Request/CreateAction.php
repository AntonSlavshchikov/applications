<?php

namespace App\Actions\Api\Request;

use App\Http\Requests\Api\Request\CreateRequest;
use App\Models\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;

class CreateAction
{
    public function __invoke(CreateRequest $request): Response
    {
        try {
            DB::beginTransaction();
            Request::create($request->validated());
            DB::commit();

            return response([
                'message' => 'Request has bee sent!'
            ], 200);
        } catch (\Exception $e) {
            DB::rollBack();
            Log::error($e->getMessage());

            return response([
                'errors' => [
                    'message' => 'Server Error! Check logs'
                ]
            ], 500);
        }
    }
}
