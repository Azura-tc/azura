<?php

namespace Database\Factories;

use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Information>
 */
class InformationFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'name' => 'Azura',
            'tel' => '+22895326489',
            'email' => 'support@azura.com',
            'created_by' => User::first()->id,
            // 'updated_by' => User::first()->id,
            // 'deleted_by' => null,
        ];
    }
}
