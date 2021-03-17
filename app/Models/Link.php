<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

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
        "tags",
        "created_at"
    ];

    public function tags(){
        return $this->hasOne(Tag::class); //link_id en tags
    }
}
