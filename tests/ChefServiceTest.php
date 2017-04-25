<?php

use App\Services\ChefService;
use App\User;
use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class ChefServiceTest extends TestCase
{
    use DatabaseMigrations;

    /** @test */
    public function test_findchef_with_no_user()
    {
        $user = factory(User::class)->create();

        $this->actingAs($user);

        $chefService = app()->make(ChefService::class);

        $chef = $chefService->findUser()->findChef()->getChef();

        $this->assertCount(1, count($chef));
    }
}
