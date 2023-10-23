<?php

namespace App\Models;

use App\Models\Project;
use App\Models\Technology;
use App\Models\ServiceFeature;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Service extends Model
{
    use HasFactory;

    /**
     * The attributes that aren't mass assignable.
     *
     * @var array
     */
    protected $guarded = [];

    public function features()
    {
        return $this->hasMany(ServiceFeature::class);
    }

    public function projects()
    {
        return $this->hasMany(Project::class);
    }

    public function technologies()
    {
        return $this->belongsToMany(Technology::class)->as('technologies');
    }
}
