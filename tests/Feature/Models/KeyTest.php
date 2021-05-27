<?php

namespace Tests\Feature\Models;

use App\Models\Key;
use App\Models\Vehicle;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class KeyTest extends TestCase
{
    use RefreshDatabase;
    protected $seed = true;
    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function test_vehicles()
    {
        $key = Key::factory()->has(Vehicle::factory()->count(3))->create();
        $vehicles = $key->vehicles;
        $this->assertTrue(is_a($vehicles, Collection::class));
        $this->assertTrue(is_a($vehicles->first(), Vehicle::class));
    }
}
