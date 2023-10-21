<?php

namespace App\Models;

use App\Models\PostTag;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class BlogPost extends Model
{
    use HasFactory;

    /**
     * The attributes that aren't mass assignable.
     *
     * @var array
     */
    protected $guarded = [];

    public function tags()
    {
        return $this->belongsToMany(PostTag::class)->as('tags');
    }
}
