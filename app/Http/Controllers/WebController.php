<?php

namespace App\Http\Controllers;

use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Response;
use Illuminate\Support\Facades\Mail;

class WebController extends Controller
{
    public function downloadPortfolio(Request $request)
    {
        //PDF file is stored under project/public/download/info.pdf
        $file = public_path() . "/portal/assets/Export-Portfolio.pdf";

        $headers = array(
            'Content-Type: application/pdf',
        );

        return Response::download($file, 'filename.pdf', $headers);
    }

    /**
     * Send contact message.
     *
     * @param Request $request
     * @return JsonResponse
     */
    public function sendContactUs(Request $request): JsonResponse
    {
        $request->validate([
            'email' => 'required|email',
            'name' => 'required',
            'user_message' => 'required',
        ]);

        Mail::send('emails.' . $request->message_type, $request->all(), function ($mes) use ($request) {
            $to = $request->message_type == 'export' ? 'export@verofoodsco.com' : 'info@verofoodsco.com';
            $mes->to([$to], 'Vero Foods')
                ->subject('Vero Foods - Get A Quote');
        });

        return response()->json(['message' => 'Email sent successfully.'], 200);
    }
}
