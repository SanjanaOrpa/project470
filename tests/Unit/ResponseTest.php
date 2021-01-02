<?php

namespace Tests\Unit;

use Tests\TestCase;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class ResponseTest extends TestCase
{
    /**
     * A basic test example.
     *
     * @return void
     */
    public function testExample()
    {
        //$this->assertTrue(true);

        $response =$this->json('POST','/user',['name'=>'sally']);

        $response ->assertStatus(201)
        ->assertJson(['created'=>true]);
    }
}
