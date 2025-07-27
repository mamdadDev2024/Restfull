<?php

test('example', function () {
    $user = \App\Models\User::factory()->create();

    $article = \App\Models\Article::factory()->create(['user_id' => $user->id]);

    $this->actingAs($user);

    $newArticle = [
        'title' => 'new title',
        'body' => 'new body'
    ];
    $response = $this->put(route('admin.article.update' , $article),
        $newArticle
    );

    $article->refresh();

    $this->assertEquals('new title', $article->title);
    $this->assertEquals('new body', $article->body);
    $response->assertStatus(200);
});
