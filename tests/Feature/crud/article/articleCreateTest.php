<?php

test('create article test', function () {
    $user = \App\Models\User::factory()->create();

    $this->actingAs($user);

    $response = $this->post(
        route('admin.article.store'),
        [
            'title' => 'post 1',
            'body' => 'body post 1',
            'user_id' => $user->id
        ]
    );

    $response->assertStatus(200);
});
