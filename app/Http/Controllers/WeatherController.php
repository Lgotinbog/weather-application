<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Http;

use Illuminate\Http\Request;

class WeatherController extends Controller
{
    public function index(Request $request)
    {
        $apiKey = 'becb1a4c2ea14797022d1f01c3d2f032';
        $city = strip_tags($request['city']);
        $response = Http::get("api.openweathermap.org/data/2.5/weather?q=$city&appid=$apiKey");
        
        if (isset($response['cod']) && $response['cod'] == '404' || $response['cod'] == '400') {
            return view('cityNotFound', ['city' => $city]);
        } else {
            $windSpeed = $response['wind']['speed'];
            $pressure = $response['main']['pressure'];
            $humidity = $response['main']['humidity'];
            $visibility = $response['visibility'] / 1000; // Перевод метров в километры
            $temperature = round($response['main']['temp'] - 273); // Перевод из кельвинов в цельсии
            $weather = $response['weather'][0]['main'];

            return view('weather', [
                'title' => 'Weather',
                'city' => $city,
                'temperature' => $temperature,
                'windSpeed' => $windSpeed,
                'pressure' => $pressure,
                'humidity' => $humidity,
                'visibility' => $visibility,
                'weather' => $weather,
                ]);
        }
        

        
     

        
    }
}

//Ветер $response['wind']['speed'];
//Давление $response['main']['pressure'];
//Влажность $response['main']['humidity'];
//Видимость $response['visibility'] / 1000;