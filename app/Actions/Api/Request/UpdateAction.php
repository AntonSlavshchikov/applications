<?php

namespace App\Actions\Api\Request;

use App\Http\Requests\Api\Request\UpdateRequest;
use Illuminate\Http\Response;

class UpdateAction
{
    public function __invoke(UpdateRequest $request, int $id): Response
    {
        return response(null, 204);
    }
}
