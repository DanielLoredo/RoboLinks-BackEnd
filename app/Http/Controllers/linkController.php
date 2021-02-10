<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\link;

class linkController extends Controller
{
    //GET ALL
    public function index(Request $request)
    {
        $links = link::all();
        return $links;
    }
}
