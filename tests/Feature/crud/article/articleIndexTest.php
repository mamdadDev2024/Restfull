<?php

test('article index test', function () {
    $user = \App\Models\User::factory()->create();

    \App\Models\Article::factory(10)->create(['user_id' => $user->id]);
    $this->actingAs($user);

    $response = $this->get(route('admin.article.index'));

    $response->assertJsonStructure(
        [
            'message',
            'data' => [
                    [
                        'id',
                        'title',
                        'body',
                        'user_id',
                        'updated_at',
                        'created_at',
                    ]
            ]
        ]
    );
    $response->assertStatus(200);
});
