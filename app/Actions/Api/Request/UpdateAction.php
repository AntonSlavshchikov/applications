<?php

namespace App\Actions\Api\Request;

use App\Http\Requests\Api\Request\UpdateRequest;
use App\Models\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;

class UpdateAction
{
    public function __invoke(UpdateRequest $request, int $id): Response
    {
        try {
            $req = Request::query()
                ->find($id);

            if (!$req) {
                return response([
                    'errors' => [
                        'message' => 'Not request!'
                    ]
                ], 404);
            }

            $req->update($request->all());

            return response([
                'message' => "Request {$req->id} updated!"
            ]);
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
