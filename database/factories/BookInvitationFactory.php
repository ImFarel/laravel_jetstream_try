<?php

namespace Database\Factories;

use App\Models\BookInvitation;
use Illuminate\Database\Eloquent\Factories\Factory;

class BookInvitationFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = BookInvitation::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'groom' => $this->faker->firstNameMale(),
            'bride' => $this->faker->firstNameFemale(),
            'password' => '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', // password
        ];
    }
}
