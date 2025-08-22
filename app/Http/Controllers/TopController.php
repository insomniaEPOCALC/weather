<?php

namespace App\Http\Controllers;

use App\Services\PlaceService;
use Illuminate\Http\Request;

class TopController extends Controller
{
    public function __construct(private PlaceService $locations){}
    public function index(){
        $places = $this->locations->getLocationDisplay();

        return view('forecasts.top', compact('places'));
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
