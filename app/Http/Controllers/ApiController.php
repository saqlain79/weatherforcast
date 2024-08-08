<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use Carbon\Carbon;

class ApiController extends Controller
{
    public function show(){
        $location= 'Chittagong';
        $apiKey = 'acf3b253a79105d5a1bb4a1163f23b4b';
        $lat = '22.9';
        $lon = '91.5';

        $response = Http::get("https://api.openweathermap.org/data/2.5/weather?q={$location}&appid={$apiKey}&units=metric");
        // $responseFuture = Http::get("https://api.openweathermap.org/data/2.5/forecast?q={$location}&cnt=5&appid={$apiKey}&units=metric");
        $geocode = Http::get("https://api.openweathermap.org/geo/1.0/reverse?lat={$lat}&lon={$lon}&appid={$apiKey}");
        $airpol = Http::get("http://api.openweathermap.org/data/2.5/air_pollution?lat={$lat}&lon={$lon}&appid={$apiKey}");
        // $map = Http::get("https://tile.openweathermap.org/map/temp_new/7/7/7.png?appid={$apiKey}");

        $dt = $response['dt'];
        $date = Carbon::createFromTimeStamp($dt)->format('Y-m-d H:i:s');

        // $futuredt = $responseFuture['list']['']['dt'];
        // $futuredate = Carbon::createFromTimeStamp($futuredt)->format('Y-m-d');

        $currenttime = Carbon::now()->format('H:i:s');
        $currentdate = Carbon::now()->format('d-M-Y');

        return view('index',
        [
            'currentWeather' => $response->json(),
            'date' => $date,
            'currenttime' => $currenttime,
            'currentdate' => $currentdate,
            'airpol' => $airpol->json(),
        ]);
    }
}
