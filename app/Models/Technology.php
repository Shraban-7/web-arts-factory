<?php

namespace App\Models;

use App\Models\Service;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Technology extends Model
{
    use HasFactory;

    /**
     * The attributes that aren't mass assignable.
     *
     * @var array
     */
    protected $guarded = [];

    public function services()
    {
        return $this->belongsToMany(Service::class);
    }
}
