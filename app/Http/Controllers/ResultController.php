<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ResultController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }
    public function index()
    {
        //
        $httpClient = new \GuzzleHttp\Client();
        $request =
            $httpClient
                ->get("https://livescore-api.com/api-client/scores/live.json&key=pisQgXMwz0LBDGA3&secret=QD5r9Lgwc0bykKsK3VAjSnPsoA41gE57?competition_id=2");

        $response = json_decode($request->getBody()->getContents());
        return view('home',[
            "data"=>$response->data,
        ]);
    }

}
