<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Projecten extends Model
{
    protected $table = 'projects';
    protected $fillable = ['name','price', 'content', 'location', 'filename', 'stage_id'];
}
