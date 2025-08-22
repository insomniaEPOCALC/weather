<?php

namespace App\Services;
use App\Models\Location;
use Illuminate\Support\Facades\Http;

class PlaceService
{
    public function getAllLocation()
    {
        $locationData = Location::get();
        return $locationData;
    }

    public function getLocationDisplayFromApiId($id){
    $location = Location::where('api_id','=', $id)->get()->first();
    $displayTop = $location->display_top;
    return $displayTop;
    }

    public function getLocationFromApiId($id){
    $location = Location::where('api_id','=', $id)->get()->first();
    return $location;
    }

    public function getLocationDisplay(){
        $locationData = Location::where('display_top','=',1)->get();
        return $locationData;
    }

    public function getPrefectureFromPost($postNum){
        $res = Http::get("https://zipcloud.ibsnet.co.jp/api/search?zipcode=". $postNum);
        $res = $res->json();
        dump($res);
        $prefecture = $res["results"][0]["address1"];
        return $prefecture;
    }

    public function searchLocations($prefecture){
        $places = Location::where("prefecture","like",'%'. $prefecture .'%')->get();
        return $places;
    }
}
