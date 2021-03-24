<?php

namespace App\Http\Controllers;

use \stdClass;
use App\Models\Link;
use App\Models\Tag;
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

    //POST
    public function store(Request $request)
    {
        $input = $request->all();
        $tags = $input["tags"];
        unset($input["tags"]);

        $link = Link::create($input);
        
        $tags["link_id"] = $link->id;
        Tag::create($tags);

        return response()->json([
            'res' => true,
            'message' => "Link agregado correctamente"
        ], 200);
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

    // DELETE
    public function destroy($id)
    {
        $link = Link::find($id);
        $link->delete();
        return response()->json([
            'res' => true,
            'message' => "Link borrado correctamente"
        ], 200);
    }
}
