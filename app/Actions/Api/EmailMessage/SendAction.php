<?php

namespace App\Actions\Api\EmailMessage;

use App\Http\Requests\Api\Email\SendRequest;
use App\Mail\NotificationMail;
use App\Models\EmailMessage;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Mail;

class SendAction
{
    public function __invoke(SendRequest $request): Response
    {
        try {
          DB::beginTransaction();
          $emailMessage = EmailMessage::create($request->all());

          Mail::to($emailMessage->email)->send(new NotificationMail($emailMessage));
          DB::commit();

            return response([
                'message' => 'Message send!'
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
