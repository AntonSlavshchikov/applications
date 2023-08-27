<?php

namespace App\Http\Controllers\Api;

use App\Actions\Api\EmailMessage\SendAction;
use App\Http\Controllers\Controller;
use App\Http\Requests\Api\Email\SendRequest;
use App\Models\EmailMessage;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class EmailMessageController extends Controller
{
    /**
     * Get all send emails
     *
     * @return Response
     */
    public function index(): Response
    {
        return response([
            'data' => EmailMessage::query()
                ->paginate(20)
        ]);
    }

    /**
     * Send email
     *
     * @param SendRequest $request
     * @param SendAction $action
     * @return Response
     */
    public function send(SendRequest $request, SendAction $action): Response
    {
        return $action($request);
    }
}
