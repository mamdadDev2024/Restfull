<?php

test('comment create test', function () {
    $response = $this->get('/');

    $response->assertStatus(200);
});
