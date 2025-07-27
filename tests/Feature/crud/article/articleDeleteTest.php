<?php

use App\Models\Article;

test('article delete test', function () {

    $user = \App\Models\User::factory()->create();

    $article = Article::factory()->create(['user_id' => $user->id]);


    $this->actingAs($user);

    $response = $this->delete(
        route('admin.article.destroy' , $article)
    );

    $response->assertStatus(200);
});
