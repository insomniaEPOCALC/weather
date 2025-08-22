<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use App\Services\PlaceService;

class WeatherController extends Controller
{

    public function __construct(private PlaceService $locations){}

    public function index(){
        return $this->weather(130010);
    }
    public function weather($place){
        $res = Http::get("https://weather.tsukumijima.net/api/forecast/city/". $place);
        $display = $this->locations->getLocationDisplayFromApiId($place);
        $id = $place;
        $res = $res->json();
        $city = $res["location"]["city"];
        $data = $res["forecasts"][0];
        $temperature = $data["temperature"]["max"]["celsius"]; //気温はnullになることがあるので注意
        if($temperature ==null){
            $data = $res["forecasts"][1];
            $temperature = $data["temperature"]["max"]["celsius"];
        }
        $date = $data["date"];
        $weather = $data["telop"];
        $img = $data["image"]["url"];
        $about = $res["description"]["bodyText"];
        $about = nl2br($about);
        return view('forecasts.weather' , compact('date','weather','img','about','temperature','city','display', 'id'));
    }

    public function searchLocation(Request $request){
        $validated = $request->validate([
            'query' => 'required|digits:7'
        ],[
        'query.required' => '郵便番号を入力してください。',
        'query.digits'   => '郵便番号は7桁の数字で入力してください。',
    ]);
        $query = $request->input('query');
        $prefecture = $this->locations->getPrefectureFromPost($query);
        $places = $this->locations->searchLocations($prefecture);
        return view('forecasts.search', compact('places','prefecture'));
    }


}
