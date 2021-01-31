<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Post extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $fillable = ['judul', 'category_id', 'content', 'gambar', 'slug'];
    protected $dates = ['deleted_at'];
    public $primary_key = 'id';
    public $timestamps = true;

    public function category(){
        return $this->belongsTo('App\Models\Category');
    }

    public function tags(){
        return $this->belongsToMany('App\Models\Tag');
    }
}
