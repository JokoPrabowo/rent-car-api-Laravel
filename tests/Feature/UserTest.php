<?php

test('Request with unused user data', function () {
    $response = $this->post('/api/users', [
        'email' => 'example@gmail.com',
        'fullname' => 'example',
        'password' => 'example'
    ]);

    $response->assertStatus(201)->assertJson([
        'data' => [
            'email' => 'example@gmail.com',
            'fullname' => 'example',
        ]
    ]);
});

test('Request with no user data', function () {
    $response = $this->post('/api/users', [
        'email' => '',
        'fullname' => '',
        'password' => ''
    ]);

    $response->assertStatus(400)->assertJson([
        'errors' => [
            'email' => [
                'The email field is required.'
            ],
            'fullname' => [
                'The fullname field is required.'
            ],
            'password' => [
                'The password field is required.'
            ]
        ]
    ]);
});

test('Request with user data that already exist', function () {
    $this->post('/api/users', [
        'email' => 'example@gmail.com',
        'fullname' => 'example',
        'password' => 'example'
    ]);
    
    $response = $this->post('/api/users', [
        'email' => 'example@gmail.com',
        'fullname' => 'example',
        'password' => 'example'
    ]);

    $response->assertStatus(400)->assertJson([
        'errors' => [
            'email' => [
                'email already registered'
            ]
        ]
    ]);
});
