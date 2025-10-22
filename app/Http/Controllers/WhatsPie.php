<?php

namespace App\Http\Controllers;

use Log;
use GuzzleHttp\Client;
use Illuminate\Http\Request;
use GuzzleHttp\Exception\RequestException;

class WhatsPie extends Controller
{
    public function showForm()
    {
        $headers = [
            'Authorization' => 'Bearer ' . config('services.whatspie.token'),
            'Accept' => 'application/json',
        ];


        try {
            $client = new \GuzzleHttp\Client();
            $response = $client->request('GET', 'https://api.whatspie.com/devices', [
                'headers' => $headers,
            ]);

            $body = $response->getBody()->getContents();
            $device_data = json_decode($body, true);

            $phone = $device_data['data'][0]['phone'] ?? null;
        } catch (RequestException $e) {
            dd($e->getMessage());
        }

        return view('send-message', compact('phone'));
    }


    public function sendMessage(Request $request)
    {
        $client = new Client();

        $headers = [
            'Authorization' => 'Bearer ' . config('services.whatspie.token'),
            'Content-Type' => 'application/json',
            'Accept' => 'application/json',
        ];

        $type = $request->input('type');
        $simulate_typing = (int) $request->input('simulate_typing', 1);

        $data = [
            'device' => $request->input('device'),
            'type' => $type,
            'simulate_typing' => $simulate_typing,
        ];

        if ($type === 'chat') {
            $data['message'] = $request->input('message');
        }

        elseif (in_array($type, ['file', 'image', 'video', 'audio'])) {
            if ($request->hasFile('image')) {
                $file = $request->file('image');

                $path = $file->store('uploads', 'public');
                $fileUrl = asset('storage/' . $path);

                $mimeType = $file->getClientMimeType();
                $fileName = $file->getClientOriginalName();

                if ($type === 'file') {
                    $data['params'] = [
                        'document' => [
                            'url' => $fileUrl,
                        ],
                        'fileName' => $fileName,
                        'mimeType' => $mimeType,
                    ];
                } elseif ($type === 'image') {
                    $data['params'] = [
                        'image' => [
                            'url' => $fileUrl,
                        ],
                        'caption' => $request->input('message', ''),
                    ];
                } elseif ($type === 'video') {
                    $data['params'] = [
                        'video' => [
                            'url' => $fileUrl,
                        ],
                        'caption' => $request->input('message', ''),
                    ];
                } elseif ($type === 'audio') {
                    $data['params'] = [
                        'audio' => [
                            'url' => $fileUrl,
                        ],
                    ];
                }
            } else {
                return redirect()->back()->with('error', 'Please upload a file for this message type.');
            }
        }

        else {
            return redirect()->back()->with('error', 'Invalid message type.');
        }

        $receivers = explode(',', $request->input('receiver'));
        $successCount = 0;
        $failedCount = 0;
        $errors = [];

        foreach ($receivers as $receiver) {
            $data['receiver'] = trim($receiver);

            try {
                $response = $client->post('https://api.whatspie.com/messages', [
                    'headers' => $headers,
                    'json' => $data,
                ]);

                $status = $response->getStatusCode();
                $body = json_decode($response->getBody(), true);

                if ($status === 200 && isset($body['success']) && $body['success']) {
                    $successCount++;
                } else {
                    $failedCount++;
                    $errors[] = $body;
                }
            } catch (RequestException $e) {
                $failedCount++;
                if ($e->hasResponse()) {
                    $errors[] = json_decode($e->getResponse()->getBody(), true);
                }
            }
        }

        if ($failedCount === 0) {
            return redirect()->back()->with('success', "Successfully sent $successCount messages!");
        } else {
            return redirect()->back(); //->with('error', "Failed to send some messages. Sent $successCount, failed $failedCount. Error: " . json_encode($errors));
        }
        
    }
}
