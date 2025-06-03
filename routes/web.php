<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Http\Request;
use App\Http\Controllers\AnswerChek;

Route::get('/', [AnswerChek::class, 'Next'] );
Route::post('/', [AnswerChek::class, 'Next'] );
Route::post('/check-answer', [AnswerChek::class, 'Check'] );

Route::get('/congrats', [AnswerChek::class, 'End']);

Route::get('/level/{niveau}', [AnswerChek::class, 'debug']);
