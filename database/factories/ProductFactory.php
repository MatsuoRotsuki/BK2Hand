<?php

namespace Database\Factories;

use App\Models\Product;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;


/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Model>
 */
class ProductFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    protected $model = Product::class;

    public function definition(): array
    {
        return [
            'product_id' => Str::uuid(),
            'name' => $this->faker->word,
            'time_used' => $this->faker->date,
            'price' => $this->faker->numberBetween(0, 9),
            'description' => $this->faker->text(255),
            'status' => $this->faker->randomElement([0, 1, 2]),
            'user_id' => Str::uuid(),
            'created_at' => $this->faker->dateTimeThisMonth(), // Tạo ngày ngẫu nhiên trong tháng này
            'updated_at' => $this->faker->dateTimeThisMonth(), // Cập nhật ngày ngẫu nhiên trong tháng này
        ];
    }
}
