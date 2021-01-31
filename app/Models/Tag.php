<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Tag extends Model
{
    use HasFactory;

    protected $table = 'tags';
    public $primary_key = 'id';
    public $timestamps = true;

    public function posts(){
        return $this->belongsToMany('App\Models\Post');
    }
}
