<?php

namespace Tests\Feature;

use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class UserTest extends TestCase
{
    /**
     * A basic test example.
     *
     * @return void
     */
    public function testExample()
    {
        $this->assertTrue(true);
    }

    public function testGettingAllCategories()
    {
        $response = $this->json('GET', '/categories');
        $response->assertStatus(200);

        $response->assertJsonStructure(
            [
                [
                    'id',
                    "created_at",
                    "updated_at",
                    "name",
                    "description"
                ]
            ]
        );
    }

    public function testShowNotFoundBook()
    {
        $response = $this->json('GET', '/categories/book/100');
        $response->assertStatus(404);
    }

    public function testShowBookFound()
    {
        $response = $this->json('GET', '/categories/books/5');
        $response->assertStatus(200);
    }

    public function destroyBook()
    {
        $response = $this->json('POST', '/categories/delete/5');
        $response->assertStatus(200);
    }
}
