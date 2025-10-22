<?php

use App\Http\Controllers\WhatsPie;
use Illuminate\Support\Facades\Route;

Route::get('/', [WhatsPie::class, 'showForm'])->name('send.message.form');
Route::post('/send-message', [WhatsPie::class, 'sendMessage'])->name('send.message');
