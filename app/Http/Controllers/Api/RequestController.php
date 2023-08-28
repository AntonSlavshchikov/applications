<?php

namespace App\Http\Controllers\Api;

use App\Actions\Api\Request\CreateAction;
use App\Actions\Api\Request\UpdateAction;
use App\Http\Controllers\Controller;
use App\Http\Requests\Api\Request\CreateRequest;
use App\Http\Requests\Api\Request\FilterRequest;
use App\Http\Requests\Api\Request\UpdateRequest;
use App\Models\Request;
use Illuminate\Http\Response;

class RequestController extends Controller
{
    /**
     * Get all requests
     *
     * @return Response
     */
    public function index(FilterRequest $request): Response
    {
        return response([
            'data' => Request::query()
                ->when(
                    $request->date,
                    fn ($query, $date) => $query->where('created_at', 'like', "$date%")
                )
                ->when(
                    $request->status,
                    fn ($query, $status) => $query->where('status',$status)
                )
                ->paginate(50)
        ]);
    }

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

    /**
     * Update request
     *
     * @param UpdateRequest $request
     * @param int $id
     * @param UpdateAction $action
     * @return Response
     */
    public function update(UpdateRequest $request, int $id, UpdateAction $action): Response
    {
        return $action($request, $id);
    }

}
