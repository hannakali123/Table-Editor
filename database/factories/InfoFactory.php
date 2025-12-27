<?php

namespace Database\Factories;

use Carbon\Carbon;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Info>
 */
class InfoFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'object' => fake()->randomNumber(),
            'spn' => fake()->randomNumber(),
            'description' => fake()->text(),
            'square-meter' => fake()->randomNumber(1.3,3.9),
            'floor' => fake()->randomNumber(1,5),
            'spaces' => fake()->randomNumber(1,6),
            'bathroom' => fake()->randomNumber(1,4),
            'street' => fake()->streetName(),
            'homenumber' => fake()->randomNumber(1,200),
            'zip' => fake()->randomNumber(),
            'city' => fake()->city(),
            'country' => fake()->country(),
            'managementtype' => fake()->randomNumber(1.2, 4.9),
            'coldrent' => fake()->randomNumber(1.2, 4.9),
            'deposit' => fake()->randomNumber(1.2, 4.9),
            'heatingcost' => fake()->randomNumber(1.2, 4.9),
            'aclsp' => fake()->randomNumber(1.2, 4.9),
            'clspo' => fake()->randomNumber(1.2, 4.9),
            'builddate' => Carbon::create('2000', '01', '01'),
            'kitchen' => fake()->boolean(),
            'balcon' => fake()->boolean(),
            'guest-toilt' => fake()->boolean(),
            'garden' => fake()->boolean(),
            'cellar' => fake()->boolean(),
            'parking' => fake()->boolean(),
            'disabledaccess' => fake()->boolean(),
            'animals' => fake()->boolean(),
            'quantityequipment' => fake()->randomElement(['gut', 'geht', 'naja', 'super', 'schlecht', 'hervorragend', 'sehr schlecht']),
            'buildingstyle'=>fake()->randomElement(['gut', 'geht', 'naja', 'super', 'schlecht', 'hervorragend', 'sehr schlecht']),
            'lastrenovation'=> Carbon::create('2000', '01', '01'),
            //
        ];
    }
}

