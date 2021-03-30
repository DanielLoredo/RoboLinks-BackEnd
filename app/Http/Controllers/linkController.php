<?php

namespace App\Http\Controllers;

use \stdClass;
use App\Models\Link;
use Illuminate\Http\Request;

class LinkController extends Controller
{

    // GET
    public function index(Request $request)
    {
        $links = Link::filter()->orderByDesc('contador')->get();

        foreach ($links as &$link) {
            $link->tags;
        }

        return $links;
    }

    //POST
    public function store(Request $request)
    {
        $input = $request->all();
        Link::create($input);
        return response()->json([
            'res' => true,
            'message' => "Link agregado correctamente"
        ], 200);
    }

    public function show(Link $link)
    {
        $link->tags;
        return $link;
    }

    // PATCH
    public function update(Request $request, $id)
    {
        $link = Link::find($id);
        $link->update($request->all());
        return response()->json([
            'res' => true,
            'message' => "Link actualizado correctamente"
        ], 200);
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
