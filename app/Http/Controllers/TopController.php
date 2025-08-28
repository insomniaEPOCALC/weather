<?php

namespace App\Http\Controllers;

use App\Services\PlaceService;
use Illuminate\Http\Request;
use App\Http\Controllers\WeatherController;

class TopController extends Controller
{
    public function __construct(private PlaceService $locations, private WeatherController $weather){}
    public function index(){
        $places = $this->locations->getLocationDisplay();
        $weathers = $this-> weather -> getTopWeather();
        return view('forecasts.top', compact('places','weathers'));
    }

    public function changeDisplayTop($id){
        $location = $this->locations->getLocationFromApiId( $id );
        $display = $location->display_top;
        if($display == 0){
            $this->locations->updateDisplayTop($id, 1);
        }else{
            $this->locations->updateDisplayTop($id, 0);
        }
        return back();
    }

}
