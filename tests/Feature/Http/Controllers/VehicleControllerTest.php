<?php

namespace Tests\Feature\Http\Controllers;

use App\Models\Key;
use App\Models\Vehicle;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class VehicleControllerTest extends TestCase
{
    public function testKeys()
    {
        //Get the first vehicle with keys, make the call and confirm expected results.
        $vehicle = Vehicle::has('keys')->first();
        $response = $this->get('/vehicle/'.$vehicle->id.'/keys');
        $response->assertStatus(200);
        $response->assertJson([['name'=>true]]);
    }
}
