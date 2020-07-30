<?php

namespace Tests;

use App\Models\User;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Illuminate\Foundation\Testing\TestCase as BaseTestCase;
use Illuminate\Foundation\Testing\WithoutMiddleware;
use Tymon\JWTAuth\Facades\JWTAuth;

abstract class TestCase extends BaseTestCase
{
    use CreatesApplication;
    use DatabaseTransactions;

    /**
     * @var User
     */
    protected $currentUser;

    public function authenticated(array $userAttributes = []): void
    {
        $user = factory(User::class)->create($userAttributes);
        $this->currentUser = $user;

        $this->be($user);

        $token = JWTAuth::fromUser($user);
        JWTAuth::setToken($token);
        $this->defaultHeaders = [
            'Authorization' => 'Bearer ' . $token
        ];
    }
}
