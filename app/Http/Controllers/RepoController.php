<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Http;
use Illuminate\Http\Request;

class RepoController extends Controller
{
    public function getDataFromUser(Request $request){
        $keyword=$request->keyword;  //no keyword params in github api
        $page=$request->page;
        $perPage=$request->perPage;

        $language=$request->language;
        $date=$request->date;
        $order=$request->order; 

        $response = Http::get("https://api.github.com/search/repositories?q=created:>${date}&sort=stars&order=${order}&language=${language}&per_page=${perPage}&page=${page}");
        $res=$response->json();

        return response()->json($res);
    }
}
