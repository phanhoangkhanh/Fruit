<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;
use App\Models\Customer;

class UserTest extends TestCase
{
    /**
     * A basic feature test example.
     */
    public function test_store_new_to_do(): void
    {
        //prepare
        $list = Customer::factory()->make(); //make
        
        //action
        $response = $this->postJson(route('todo-list.store'),['name' => $list->name , 'address' => $list->address])
                            ->assertCreated()
                            ->json();

        //assertion
        $response->assertCreated();

    }
}
