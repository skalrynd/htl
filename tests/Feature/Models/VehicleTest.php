<?php

namespace Tests\Feature\Models;

use App\Models\Key;
use App\Models\Vehicle;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class VehicleTest extends TestCase
{
    use RefreshDatabase;

    protected $seed = true;

    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function test_example()
    {
        $vehicle = Vehicle::factory()->has(Key::factory()->count(3))->create();
        $keys = $vehicle->keys;
        $this->assertTrue(is_a($keys, Collection::class));
        $this->assertTrue(is_a($keys->first(), Key::class));
    }
}
