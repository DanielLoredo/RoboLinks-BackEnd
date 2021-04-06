<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LinkController;
use Illuminate\Http\Redirect;
use App\Models\Link;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::get('{shortUrl}', function ($shortUrl){ 

    //CHANGE             ↓↓↓↓↓↓↓          when deployed
    $realShortUrl = "https://robo.io/".$shortUrl;
    
    DB::table('links')->where('short_url',$realShortUrl)->increment('contador');
    $link = DB::table('links')->where('short_url',$realShortUrl)->get("url");
    $decoded_traces=json_decode($link, true);
    $real = $decoded_traces[0]["url"];
    return redirect()->away("{$real}");
});
