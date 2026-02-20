<?php

use App\Models\User;

test('guests are redirected to the login page', function () {
    $this->get('/dashboard')->assertRedirect('/login');
});

test('authenticated users can visit the dashboard', function () {
    $user = User::factory()->create();
    
    // Ensure user is verified (email_verified_at is set)
    $user->email_verified_at = now();
    $user->save();
    
    $this->actingAs($user);

    $this->get('/dashboard')->assertStatus(200);
});