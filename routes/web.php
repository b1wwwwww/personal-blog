<?php

use Illuminate\Support\Arr;
use Illuminate\Support\Facades\Route;

class Post {
    public static function all(){
        return [
            [
                'id' => '1',
                'slug' => 'judul-artikel-1',
                'title' => 'Judul artikel 1',
                'author' => 'Nabil Yusra',
                'body' => 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Qui accusantium cum similique in provident facere labore consectetur voluptas laboriosam. Eaque aut ratione eum.
                Autem unde labore ullam aspernatur impedit. Maiores!'
            ],

            [
                'id' => '2',
                'slug' => 'judul-artikel-2',
                'title' => 'Judul artikel 2',
                'author' => 'Nabil Yusra',
                'body' => 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Dolore earum ratione aliquid ullam, rerum consequatur possimus nisi libero suscipit.
                Omnis quia sed soluta non labore optio dolores alias sint illo!'
            ]
        ];
    }
}

Route::get('/', function () {
    return view('home', ['title' => 'Home Page']);
});

Route::get('/about', function () {
    return view('about', ['name' => 'Nabil Yusra', 'title' => 'About Us']);
});

Route::get('/posts', function () {
    return view('posts', ['title' => 'Blog', 'posts' => Post::all() ]);
});

Route::get('/posts/{slug}', function (string $slug) {

    $post = Arr::first(Post::all(), function ($post) use ($slug) {
        return $post['slug'] === $slug;
    });

    if (!$post) {
        abort(404);
    }

    return view('post', ['title' => 'Single Post', 'post' => $post]);
});

Route::get('/contact', function () {
    return view('contact', ['title' => 'Contact']);
});