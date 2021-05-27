<?php

namespace Tests\Feature\Models;

use App\Models\Technician;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class TechnicianTest extends TestCase
{
    function testFormattedName()
    {
        $technician = Technician::factory()->make();
        $firstName = $technician->first_name;
        $lastName = $technician->last_name;
        $formatted = $technician->formatted_name;
        $this->assertEquals($formatted, $firstName . ' ' . $lastName);
    }
}
