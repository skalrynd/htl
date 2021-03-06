<?php

namespace Database\Factories;

use App\Models\Vehicle;
use Illuminate\Database\Eloquent\Factories\Factory;

class VehicleFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Vehicle::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'year'  => $this->faker->year,
            'make'  => $this->faker->word,
            'model' => $this->faker->word,
            'vin'   => $this->faker->bothify('??######?##?#######')
        ];
    }
}
