<?php

namespace Database\Factories;

use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

class OrderFactory extends Factory
{
    public function definition(): array
    {
        return [
            'user_id'          => User::inRandomOrder()->first()->id,
            'invoice_number'   => 'INV-' . fake()->unique()->numerify('#####'),
            'customer_name'    => fake()->company(),
            'customer_number'  => fake()->numerify('CLI-####'),
            'fiscal_data'      => fake()->text(80),
            'order_date'       => fake()->dateTimeBetween('-3 months', 'now'),
            'delivery_address' => fake()->address(),
            'notes'            => fake()->sentence(),
            'status'           => fake()->randomElement([
                                      'Ordered','In process','In route','Delivered'
                                  ]),
            'deleted'          => false,
        ];
    }
}