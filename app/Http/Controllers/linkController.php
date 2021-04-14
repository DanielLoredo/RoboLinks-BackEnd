<?php

namespace App\Http\Controllers;

use \stdClass;
use App\Models\Link;
use App\Models\Tag;
use Illuminate\Http\Request;

class LinkController extends Controller
{

    // GET
    public function index(Request $request)
    {
        $links = Link::filter()->orderByDesc('contador')->get();
        //$links = Link::orderByDesc('contador')->get();
        //$filtered = $links->whereIn('private', $request,);
        foreach ($links as &$link) {
            $link->tags;
        }
        return response()->json([
            "res" => true,
            "data" => $links
        ], status:200);
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
        ], 201);
    }

    public function show(Link $link)
    {
        $link->tags;
        return response()->json([
            'res' => true,
            'data' => $link
        ], 200);
    }

    // PATCH
    public function update(Request $request, $id)
    {
        $link = Link::find($id);
        $tags = Tag::firstWhere('link_id', $id);

        $input = $request->all();

        if(array_key_exists("tags", $input)){
            $tagsToUpdate = $input["tags"];
        
            $tags->update(["@home"=>false,"candidates"=>false,"contests"=>false,
            "covid"=>false,"docs"=>false,"drones"=>false,"electronics"=>false,
            "github"=>false,"larcOpen"=>false,"mechanics"=>false,"presentation"=>false,
            "programming"=>false,"robocup"=>false,"sideProjects"=>false,"social"=>false,
            "sponsors"=>false,"vsss"=>false,"youtube"=>false,"workshop"=>false]);

            $tags->update($tagsToUpdate);
        }
         
        $link->update($request->all());
        return response()->json([
            'res' => true,
            'message' => "Link actualizado correctamente"
        ], 201);
    }

    // DELETE
    public function destroy($id)
    {
        $link = Link::find($id);
        $tags = Tag::firstWhere('link_id', $id);
        $link->delete();
        $tags->delete();
        return response()->json([
            'res' => true,
            'message' => "Link borrado correctamente"
        ], 204);
    }
}
