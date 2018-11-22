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
        $response = $this->json('GET', '/books/100');
        $this->assertEquals(404, $response->status());
//        $response->assertExactJson([
//                'created' => true,
//            ]);

    }
//
    public function testShowBookFound()
    {
        $response = $this->json('GET', '/books/5');
        $this->assertEquals(200, $response->status());
        $response->assertExactJson([
            "id" => 5,
            "created_at" => null,
            "updated_at" => null,
            "category_id" => 5,
            "name" => "name",
            "description" => "desc",
            "author" => "auth"
        ]);
    }
//
    public function destroyBook()
    {
        $response = $this->json('DELETE', '/book/5');
        $this->assertEquals(204, $response->status());
        //$response->assertStatus(200);
    }

    public function destroyCategory()
    {
        $response = $this->json('DELETE', '/categories/5');
        $this->assertEquals(204, $response->status());
        //$response->assertStatus(200);
    }
//
    public function testShowACategorySuccess() {
        $response = $this->json('GET', '/categories/1');
        $response->assertStatus(200);
        $response->assertExactJson([
            "id" => 1,
            "created_at" => null,
            "updated_at" => null,
            "name" => "hindi",
            "description" => "hindi"
        ]);
    }
//
    public function testShowACategoryFailure() {
        $response = $this->json('GET', '/categories/100');
        $response->assertStatus(404);
        $response->assertExactJson([
            "error" => "Category not found"
        ]);
    }
//
    public function testCreateCategory() {
        $response = $this->json('POST', '/categories', ['name' => 'name', 'description'=> 'description']);

        $response->assertStatus(201);
        $response->assertJson([
            'name' => 'name',
            'description' => 'description'
        ]);
    }
}
