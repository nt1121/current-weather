<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Location;

class LocationController extends Controller
{
    public function findById($id)
    {
        $location = Location::find($id);
        if (empty($location)) {
            abort(400);
        }
        $prefecture = $location->prefecture;
        if (empty($prefecture)) {
            abort(400);
        } 
        $data = [];
        $data['prefectureId'] = $prefecture->id;
        $data['prefectureName'] = $prefecture->name;
        $data['locationName'] = $location->name;
        $url = 'https://api.openweathermap.org/data/2.5/weather?lat=' . $location->latitude . '&lon=' . $location->longitude . '&units=metric&lang=ja&appid=' . config('open_weather_map.api_key');
        $json = file_get_contents($url);
        $response = json_decode($json, true);
        if (
            !isset($response['weather'][0]['description']) || 
            !isset($response['weather'][0]['icon']) || 
            !isset($response['main']['temp']) || 
            !isset($response['main']['humidity']) || 
            !isset($response['dt'])
        ) {
            abort(400);
        }
        $data['description'] = $response['weather'][0]['description'];
        $data['iconSrc'] = 'https://openweathermap.org/img/wn/' . $response['weather'][0]['icon'] . '@4x.png';
        $data['temp'] = (int)floor($response['main']['temp']);
        $data['humidity'] = $response['main']['humidity'];
        $data['dateTimeText'] = date('Y年m月d日 H時i分', $response['dt']);
        return response()->json($data);
    }
}
