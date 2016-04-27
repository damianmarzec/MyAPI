<?php

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class UserTest extends TestCase
{
    /**
     * A basic test example.
     *
     * @return void
     */
    public function testLogin()
    {
        $user = factory(App\User::class)
            ->create([
                'password' => bcrypt('loginTest123')
            ]);

        $params = [
            'name' => $user->name,
            'password' => 'loginTest123'
        ];

        $login = $this->call('POST', route('login'), $params)->getContent();
        $loginData = json_decode($login);
        $this->assertTrue($loginData->status == 200);
        $this->assertTrue($loginData->user->token == $user->token);
    }
}
