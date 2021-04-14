<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Tag;

class Link extends Model
{
    use HasFactory;

    protected $table = "links";

    protected $fillable = [
        "url",
        "short_url",
        "title",
        "private",
        "image",
        "contador",
        "created_at"
    ];

    public function tags()
    {
        return $this->hasOne(Tag::class); //link_id en tags
    }

    public function scopeFilter($query)
    {
        if (request('title')) {
            $query->where('title', request('title'));
        }

        if (request('private')) {
            $query->where('private', request('private'));
        }

        if (request('short_url')) {
            $query->where('short_url', request('short_url'));
        }

        if (request('url')) {
            $query->where('url', request('url'));
        }

        return $query;
    }
}
