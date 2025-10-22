<?php

namespace App\Http\Controllers;

use GuzzleHttp\Client;
use GuzzleHttp\Exception\RequestException;
use Illuminate\Http\Request;

class WhatsPie extends Controller
{
    public function showForm() {
        return view('send-message');
    }

    public function sendMessage(Request $request)
    {
        $client = new Client();

        $headers = [
            'Content-Type' => 'application/json',
            'Accept' => 'application/json',
            'Authorization' => 'Bearer ' . config('services.whatspie.token'),
        ];

        $data = [
            'device' => $request->input('device'),
            'type' => $request->input('type'),
            'simulate_typing' => (int) $request->input('simulate_typing', 1),
        ];

        if ($request->input('type') === 'chat') {
            $data['message'] = $request->input('message');
        }

        elseif ($request->input('type') === 'image') {
            if ($request->hasFile('image')) {
                $file = $request->file('image');
                $data['file'] = base64_encode(file_get_contents($file->getRealPath()));
                $data['file_name'] = $file->getClientOriginalName();
                $data['file_mime'] = $file->getClientMimeType();
            } else {
                return redirect()->back()->with('error', 'File is required for file/image messages.');
            }
        }

        $receivers = explode(",", $request->input('receiver'));

        $successCount = 0;
        $failedCount = 0;

        foreach ($receivers as $receiver) {
            $data['receiver'] = trim($receiver);

            $body = json_encode($data);

            try {
                $request = new \GuzzleHttp\Psr7\Request('POST', 'https://api.whatspie.com/messages', $headers, $body);
                $response = $client->sendAsync($request)->wait();

                if ($response->getStatusCode() === 200) {
                    $successCount++;
                } else {
                    $failedCount++;
                }
            } catch (RequestException $e) {
                $failedCount++;
            }
        }

        if ($failedCount === 0) {
            return redirect()->back()->with('success', "Successfully sent $successCount messages!");
        } else {
            return redirect()->back()->with('error', "Failed to send some messages. Sent $successCount messages, failed $failedCount.");
        }
    }
}
