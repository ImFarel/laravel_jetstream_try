<?php

namespace Database\Factories;

use App\Models\Contact;
use Illuminate\Database\Eloquent\Factories\Factory;

class ContactFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Contact::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        $number = [6287874314272, 6289608652283, 6285814142911];
        return [
            'name' => $this->faker->name,
            'phone' => 6287874314272,
            'sended' => false,
            'invitation_id' => $this->faker->numberBetween(1, 5),
            'schedule' => date("Ymd")
        ];
    }
}
