<?php

namespace Tests\Unit;

use App\User;
use Tests\TestCase;
use Laravel\Passport\Passport;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class PassportTest extends TestCase
{
    use DatabaseMigrations;

    public function testBasicTest()
    {
        Passport::actingAs($user = factory(User::class)->create());

        $response = $this->get('/api/v1/me');

        $response->assertSuccessful();
        $response->assertJson($user->toArray());
    }
}
