<?php

test('the application returns a successful response', function () {
    $response = $this->get('/');

    $response->assertStatus(200);
});

test('single post page returns a successful response', function () {
    $response = $this->get('/posts/judul-artikel-1');

    $response->assertStatus(200)
        ->assertSee('Judul artikel 1');
});
