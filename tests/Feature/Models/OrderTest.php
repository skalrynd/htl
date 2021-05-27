<?php

namespace Tests\Feature\Models;

use App\Models\Key;
use App\Models\Order;
use App\Models\Technician;
use App\Models\Vehicle;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class OrderTest extends TestCase
{
    use RefreshDatabase;
    protected $seed = true;

    function testRelationships()
    {
        $order = Order::factory()
            ->for(Vehicle::factory())
            ->for(Key::factory())
            ->for(Technician::factory())
            ->create()
        ;
        $this->assertTrue(is_a($order->vehicle, Vehicle::class));
        $this->assertTrue(is_a($order->key, Key::class));
        $this->assertTrue(is_a($order->technician, Technician::class));
    }
}
