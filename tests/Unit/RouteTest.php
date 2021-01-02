<?php

namespace Tests\Unit;

use Tests\TestCase;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class RouteTest extends TestCase
{
    /**
     * A basic test example.
     *
     * @return void
     */
    public function testExample()
    {
        $response =$this->get("http://localhost/pharmacy/MVC/Controller/");
        $response->assertStatus(404);

        $responses = $this->post("http://localhost/pharmacy/MVC/Controller/");
        $responses->assertStatus (404);


    }
}
