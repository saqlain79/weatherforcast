<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ApiController;

route::get('/', [ApiController::class, 'show'])->name('index');
