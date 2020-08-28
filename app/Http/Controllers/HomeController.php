<?php

namespace App\Http\Controllers;


use Carbon\Carbon;
use DateTime;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class HomeController extends Controller
{
    //
    public function index(){

        //dd('Index');
        $allLiveMatchesItems = [];
        $allUpcomingMatchesItems = [];
        $liveMatches = json_decode(Http::get('https://rest.entitysport.com/v2/matches/',[
            'token' => '437214169d9be2a73e91d22f76f68b52',
            'status' => 3,
            'paged' => 1,
            'per_page' => 10
        ])->body());
        $upcomingMatches = json_decode(Http::get('https://rest.entitysport.com/v2/matches/',[
            'token' => '437214169d9be2a73e91d22f76f68b52',
            'status' => 1,
            'paged' => 1,
            'per_page' => 10
        ])->body());

        if(!empty($liveMatches->response->items)){
            $allLiveMatchesItems = $liveMatches->response->items;
        }
        if(!empty($upcomingMatches->response->items)){
            $allUpcomingMatchesItems = $upcomingMatches->response->items;
        }

        //dd($allLiveMatchesItems[0]);
        //dd($allUpcomingMatchesItems[0]);
        //dd(date('h:i A',$allLiveMatchesItems[0]->timestamp_start));
        //dd($allUpcomingMatchesItems);

        //var_dump($allLiveMatchesItems[0]->date_start);


        return view('welcome',compact('allLiveMatchesItems','allUpcomingMatchesItems'));
    }
}
