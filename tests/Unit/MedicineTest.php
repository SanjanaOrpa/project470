<?php

namespace Tests\Unit;

use Tests\TestCase;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class MedicineTest extends TestCase
{
    /**
     * A basic test example.
     *
     * @return void
     */
    public function testExample()
    {
        $this->assertDatabaseHas('medicines' , ['medicine_isbn'=>"	
        978-1-49192-706-9"]);

        $this->assertDatabaseHas('medicines' , ['medicine_title'=>"napa extra"]);

        $this->assertDatabaseHas('medicines' , ['generic_name'=>"Caffeine+Paracetamol"]);
    }
}
