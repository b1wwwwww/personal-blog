<?php 

namespace App\Models; 

use Illuminate\Support\Arr;

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

    public static function find($slug) : array
    {
        // pake callback
        // return Arr::first(static::all), function ($post) use ($slug) {
        //  return $post['slug'] == $slug;
        // }


        // pake Arrow function 
        $post =  Arr::first(static::all(), fn ($post) => $post['slug'] == $slug);

        if(! $post){
            abort(404);
        }

        return $post;
    }
}