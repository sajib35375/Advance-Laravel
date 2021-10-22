<?php

use Illuminate\Support\Facades\Route;




Route::get('/', function () {
    return view('posts');
});

Route::get('/posts/{post}',function ($slug){

    $post = \App\Models\Post::find($slug);

    return view('post',[
        'post' => $post
    ]);


});
