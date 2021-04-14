<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Tag extends Model
{
    use HasFactory;

    protected $table = "tags";

    protected $fillable = [
        "link_id",
        "GitHub",
        "Social",
        "@Home",
        "VSSS",
        "Sponsors",
        "Documentation",
        "Facebook",
        "YouTube",
        "ML",
        "AI",
        "Robotics",
        "Mechanics",
        "Candidates",
        "created_at"
    ];

    public function scopeFilter($query)
    {
        foreach (explode(",", request('tags')) as $tag) {
            $query->where($tag, 1);
        }
        return $query;
    }
}
