<?php

namespace App\Http\Controllers;

use \stdClass;
use App\Models\Link;
use Illuminate\Http\Request;

class LinkController extends Controller
{

    // GET
    public function index()
    {
        $links = Link::all();
        foreach ($links as &$link) {
            $link->tags;
        }
        return $links;
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function show(Link $link)
    {
        $link->tags;
        return $link;
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
