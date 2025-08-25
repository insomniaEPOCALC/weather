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

    public function getLocationDisplayFromApiId($id)
    {
        $location = Location::where('api_id', '=', $id)->get()->first();
        $displayTop = $location->display_top;
        return $displayTop;
    }

    public function getLocationFromApiId($id)
    {
        $location = Location::where('api_id', '=', $id)->get()->first();
        return $location;
    }

    public function getLocationDisplay()
    {
        $locationData = Location::where('display_top', '=', 1)->get();
        return $locationData;
    }

    public function getPrefectureFromPost($postNum)
    {
        $res = Http::get("https://zipcloud.ibsnet.co.jp/api/search?zipcode=" . $postNum);
        $res = $res->json();
        if (isset($res["results"][0]["address1"])) {
            $prefecture = $res["results"][0]["address1"];
        }else{
            $prefecture = "ISS";
        }
        return $prefecture;
    }

    public function searchLocations($prefecture)
    {
        $places = Location::where("prefecture", "like", '%' . $prefecture . '%')->get();

        if($prefecture == 'ISS') {
            $places->name = 'ISS';
            $places->api_id = 00000;
        }
        return $places;
    }

    public function updateDisplayTop($id, $displayTop)
    {
        $place = Location::where('api_id', '=', $id)->get()->first();
        $place->display_top = $displayTop;
        $place->timestamps = false;
        $place->save();
    }
}
