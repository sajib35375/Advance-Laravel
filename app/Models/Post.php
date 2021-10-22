<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\ModelNotFoundException;

class Post extends Model
{
    use HasFactory;

    public static function find($slug){
        $path = resource_path("post/{$slug}.html");

    if (!file_exists($path)){
        throw new ModelNotFoundException();
    }

     return cache()->remember("posts.{$slug}", 1200, fn() => file_get_contents($path));
    }


}
