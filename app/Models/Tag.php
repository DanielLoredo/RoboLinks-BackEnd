<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Tag extends Model
{
    use HasFactory;

    public $table = "tags";

    public $fillable = [
        "link_id",
        "@home",
        "candidates",
        "contests",
        "covid",
        "docs",
        "drones",
        "electronics",
        "github",
        "larcOpen",
        "mechanics",
        "presentation",
        "programming",
        "robocup",
        "sideProjects",
        "social",
        "sponsors",
        "vsss",
        "youtube",
        "workshop",
        "created_at"
    ];

    public function scopeFilter($query)
    {
        foreach (explode(",", request('tags')) as $tag) {
            print_r($tag);
            $query->where($tag, 1);
        }
        return $query;
    }
}
