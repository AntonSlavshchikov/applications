<?php

namespace App\Http\Controllers\Api;

use App\Actions\Api\Request\CreateAction;
use App\Http\Controllers\Controller;
use App\Http\Requests\Api\Request\CreateRequest;
use Illuminate\Http\Response;

class RequestController extends Controller
{
    /**
     * Create new request
     *
     * @param CreateRequest $request
     * @param CreateAction $action
     * @return Response
     */
    public function create(CreateRequest $request, CreateAction $action): Response
    {
        return $action($request);
    }

    public function update(): Response
    {
        return response(null, 204);
    }

    public function getAll(): Response
    {
        return response(null, 204);
    }
}
