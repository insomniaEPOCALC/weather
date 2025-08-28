<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use App\Services\PlaceService;
use Carbon\Carbon;
use Gemini\Laravel\Facades\Gemini;

class WeatherController extends Controller
{

    public function __construct(private PlaceService $locations){}

    public function index(){
        return $this->weather(130010,1);
    }


    public function weather($place,$geminiFlag = 1){
        $res = Http::get("https://weather.tsukumijima.net/api/forecast/city/". $place);
        $display = $this->locations->getLocationDisplayFromApiId($place);
        $id = $place;
        $res = $res->json();
        $city = $res["location"]["city"];
        $data = $res["forecasts"][0];
        $dataNext = $res["forecasts"][1];


        $temperature = $data["temperature"]["max"]["celsius"]; //気温はnullになることがあるので注意
        if($temperature ==null){
            $data = $res["forecasts"][1];
            $temperature = $data["temperature"]["max"]["celsius"];
            $dataNext = $res["forecasts"][2];
        }
        $date = $data["date"];
        $date = Carbon::parse($date)->format('Y年m月d日');
        $weather = $data["telop"];
        $img = $data["image"]["url"];
        $info = $this->getInfo($img);
        $about = $res["description"]["bodyText"];
        $about = nl2br($about);
        $comment = '';
        if($geminiFlag == 1){
        $comment = $this->getGeminiComment($city, $res);
    }

        $icon = $this->getIconFromInfo($info);

        $dateNext = $dataNext['date'];
        $dateNext = Carbon::parse($dateNext)->format('Y年m月d日');
        $imgNext = $dataNext["image"]["url"];
        $infoNext = $this->getInfo($imgNext);
        $iconNext = $this->getIconFromInfo($infoNext);
        $temperatureMaxNext = $dataNext["temperature"]["max"]["celsius"];
        $temperatureMinNext = $dataNext["temperature"]["min"]["celsius"];

        return view('forecasts.weather' , compact('date','weather','img','about','temperature','city','display', 'id','info','icon','comment','dateNext','iconNext','temperatureMaxNext','temperatureMinNext'));
    }

    public function getGeminiComment($city,$res){

        $data = $res["forecasts"][0];
        $city = $res["location"]["city"];
        $data = $res["forecasts"][0];


        $temperature = $data["temperature"]["max"]["celsius"]; //気温はnullになることがあるので注意
        if($temperature ==null){
            $data = $res["forecasts"][1];
            $temperature = $data["temperature"]["max"]["celsius"];
        }
        $date = $data["date"];
        $date = Carbon::parse($date)->format('Y年m月d日');
        $detail = $data['detail']['weather'];
        $weather = $data["telop"];
        $about = $res["description"]["bodyText"];
        $about = nl2br($about);
        $prompt = '次のデータは'.$city.'の'.$date."の天気のデータです。このデータから、この日の具体的な服装のアドバイス、行く場所を含めた1日の過ごし方、献立を含めた体調管理のアドバイスを簡単なhtml形式で出力してください。献立には、可能なら特産を入れてください。ブログ内部に埋め込むので、bodyやhtml宣言の宣言は不要です。||までの次のフォーマットに必ず則った内容のみ出力し、他のものは絶対に出力しないでください：<div class='advice'><h2>服装</h2><p>（服装のアドバイス）</p></div><div class='advice'><h2>1日の過ごし方</h2><p>（過ごし方のアドバイス）</p></div><div class='advice'><h2>体調管理</h2><p>（体調管理のアドバイス）</p></div> || 以下はデータです天気は".$weather.'、気温は'.$temperature.'。予報は次のとおり：'.$detail.'。前後の日を含めた詳細情報は次のとおり：'.$about;

        $result = Gemini::generativeModel('models/gemini-2.0-flash')->generateContent($prompt);

        return $result->text();
    }

    public function getInfo($img){
        $imgFile = basename($img);
        $imgNum = pathinfo($imgFile, PATHINFO_FILENAME);
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

        return $info;
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

    public function searchLocationByName(Request $request){
        $query = $request->input('query');
        $prefecture = $query;
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

    public function getIconFromInfo($info){
        switch ($info){
            case 'sunny':
                return asset('img/sunny.svg');
            case 'cloudy':
                return asset('img/cloudy.svg');
            case 'rainy':
                return asset('img/rainy.svg');
            case 'snowy':
                return asset('img/snowy.svg');
            case 'sunnyCloudy':
                return asset('img/sunnycloudy.svg');
            case 'sunnyRainy':
                return asset('img/sunnyrainy.svg');
            case 'cloudyRainy':
                return asset('img/cloudyrainy.svg');
            case 'storm':
                return asset('img/storm.svg');
            case 'sunnyNight':
                return asset('img/night.svg');
            default:
                return null;
        }
    }


    public function getTopWeather(){
        $tokyo = $this->weather('130010',0);
        $osaka = $this->weather('270000',0);
        $yokohama = $this->weather('140010',0);
        $kobe = $this->weather('280010',0);
        $sendai = $this->weather('040010',0);
        $hiroshima = $this->weather('340010',0);
        $sapporo = $this->weather('016010',0);
        $fukuoka = $this->weather('400010',0);
        $weathers = array($tokyo,$osaka,$yokohama,$kobe,$sendai,$hiroshima,$sapporo,$fukuoka);
        return $weathers;
    }






}
