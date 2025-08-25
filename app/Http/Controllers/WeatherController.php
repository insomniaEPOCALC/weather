<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use App\Services\PlaceService;
use Carbon\Carbon;

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
        $date = Carbon::parse($date)->format('Y年m月d日');
        $weather = $data["telop"];
        $img = $data["image"]["url"];
        $imgFile = basename($img);
        $imgNum = pathinfo($imgFile, PATHINFO_FILENAME);
        $about = $res["description"]["bodyText"];
        $about = nl2br($about);
        $info = '';

        if($imgNum <200){
            $info = 'sunny';
        }elseif($imgNum <300 ){
            $info = 'cloudy';
        }elseif($imgNum < 400){
            $info = 'rainy';
        }elseif($imgNum < 500){
            $info = 'snowy';
        }else{
            $info = 'sunnyNight';
        }

        return view('forecasts.weather' , compact('date','weather','img','about','temperature','city','display', 'id','info'));
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
        if(isset($places->name)){
            $res = Http::get('http://api.open-notify.org/iss-now.json');
            $res = $res->json();
            $longitude = $res['iss_position']['longitude'];
            $latitude = $res['iss_position']['latitude'];
            return view('forecasts.search', compact('places','longitude','latitude'));
        }
        return view('forecasts.search', compact('places','prefecture'));
    }


}
