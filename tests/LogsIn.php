<?php

namespace Tests;

use App\Models\User;

trait LogsIn
{
    protected User $user;

    /**
     * Creates a user and logs the user in.
     */
    public function loginUser(): void
    {
        $this->user = User::factory()->create();
        $this->post('/login', [
            'email' => $this->user->email,
            'password' => 'password',
        ]);
    }
}
