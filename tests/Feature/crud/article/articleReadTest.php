<?php

use App\Models\Article;

test('article read test', function () {

    $user = \App\Models\User::factory()->create();

    $article = Article::factory()->create(['user_id' => $user->id]);

    $this->actingAs($user);

    $response = $this->get(route('admin.article.show' , $article->id));

    $response->assertJsonStructure([
        'message',
        'data' => [
            'id',
            'title',
            'body',
            'user_id',
            'created_at',
            'updated_at',
        ]
    ]);

    $response->assertStatus(200);
});
