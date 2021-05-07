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
        if (isset($request->tags)) {
            $link_tag_array = Tag::filter()->get();
            $link_ids = $link_tag_array->pluck('link_id');
            $links = Link::whereIn('id', $link_ids)->filter()->orderByDesc('contador')->get();

            foreach ($links as &$link) {
                $arr = [];
                $link->tags;
                $key = array_keys(array_slice($link["tags"]->getOriginal(),0,21),1);
                if(!empty($key)){
                    if($key[0] == "id"){
                        array_splice($key, 0,1);
                    }
                    if($key[0] == "link_id"){
                        array_splice($key, 0,1);
                    }
                }
                unset($link["tags"]);
                $link->tags = $key;
                
            }
        } else {
            $links = Link::filter()->orderByDesc('contador')->get();
            foreach ($links as &$link) {
                $arr = [];
                $link->tags;
                $key = array_keys(array_slice($link["tags"]->getOriginal(),0,21),1);
                if(!empty($key)){
                    if($key[0] == "id"){
                        array_splice($key, 0,1);
                    }
                    if($key[0] == "link_id"){
                        array_splice($key, 0,1);
                    }
                }
                unset($link["tags"]);
                $link->tags = $key;
             } 
        }


        return response()->json([
            "res" => true,
            "data" => $links
        ], 200);
    }

    //POST
    public function store(Request $request)
    {
        $input = $request->all();
        $tags = $input["tags"];
        unset($input["tags"]);

        $link = Link::create($input);

        $keys = [];

        foreach($tags as $tag){
            $keys = (object) array_merge( (array)$keys, array( $tag =>1 ) );
        }
        $keys->link_id = $link->id;
        $array = get_object_vars($keys);
        Tag::create($array);

        return response()->json([
            'res' => true,
            'message' => "Link agregado correctamente"
        ], 201);
    }

    public function show(Link $link)
    {
        $arr = [];
        $link->tags;
        $key = array_keys(array_slice($link["tags"]->getOriginal(),0,21),1);
        if(!empty($key)){
            if($key[0] == "id"){
                array_splice($key, 0,1);
            }
            if($key[0] == "link_id"){
                array_splice($key, 0,1);
            }
        }
        unset($link["tags"]);
        $link->tags = $key;
        
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
            $tags->update(["@home"=>false,"candidates"=>false,"contests"=>false,
            "covid"=>false,"docs"=>false,"drones"=>false,"electronics"=>false,
            "github"=>false,"larcOpen"=>false,"mechanics"=>false,"presentation"=>false,
            "programming"=>false,"robocup"=>false,"sideProjects"=>false,"social"=>false,
            "sponsors"=>false,"vsss"=>false,"youtube"=>false,"workshop"=>false]);

            $tag2update = $input["tags"];    
            $keys = [];
            foreach($tag2update  as $tag){
                $keys = (object) array_merge( (array)$keys, array( $tag =>1 ) );
            }
            $array = get_object_vars($keys);
            $tags->update($array);
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
