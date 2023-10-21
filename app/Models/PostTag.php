<?php

namespace App\Models;

use App\Models\BlogPost;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class PostTag extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['tag_name','tag_slug','tag_desc'];

    public function posts()
    {
        return $this->belongsToMany(BlogPost::class);
    }
}
