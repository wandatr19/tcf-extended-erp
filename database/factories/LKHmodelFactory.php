<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\LKHmodel;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\LKHmodel>
 */
class LKHmodelFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    protected $model = LKHmodel::class;
     public function definition(): array
    {
        return [
            'line' => $this->faker->numberBetween(1,4),
            'shift' => $this->faker->numberBetween(1,3),
            'part_no' => $this->faker->unique()->numerify('########'),
            'customer' => $this->faker->company,
            'prod_date' => $this->faker->dateTimeBetween('2024-12-09', '2024-12-13')->format('Y-m-d'),
            'hole_ta' => $this->faker->numberBetween(1,20),
            'hole_tembus' => $this->faker->numberBetween(1,20),
            'hole_mengecil' => $this->faker->numberBetween(1,20),
            'hole_mencuat' => $this->faker->numberBetween(1,20),
            'hole_geser' => $this->faker->numberBetween(1,20),
            'hole_doubleprc' => $this->faker->numberBetween(1,20),
            'neck' => $this->faker->numberBetween(1,20),
            'crack_p' => $this->faker->numberBetween(1,20),
            'glmbg_krpt' => $this->faker->numberBetween(1,20),
            'trim_over' => $this->faker->numberBetween(1,20),
            'trim_min' => $this->faker->numberBetween(1,20),
            'trim_mencuat' => $this->faker->numberBetween(1,20),
            'bend_min' => $this->faker->numberBetween(1,20),
            'bend_over' => $this->faker->numberBetween(1,20),
            'emb_geser' => $this->faker->numberBetween(1,20),
            'double_emb' => $this->faker->numberBetween(1,20),
            'penyok_defom' => $this->faker->numberBetween(1,20),
            'krg_stamp' => $this->faker->numberBetween(1,20),
            'material_s' => $this->faker->numberBetween(1,20),
            'baret_scratch' => $this->faker->numberBetween(1,20),
            'dent' => $this->faker->numberBetween(1,20),
            'others' => $this->faker->numberBetween(1,20),
            'dies_process' => $this->faker->randomElement(['OP10','OP20','OP30','OP40','OP50']),
            'time_start' => $this->faker->time('H:i:s'),
            'time_finish' => $this->faker->time('H:i:s'),
            'sampling' => $this->faker->numberBetween(1,20),
            'total_prod' => $this->faker->numberBetween(20,50),
            'part_ok' => $this->faker->numberBetween(0,30),
            'part_repair' => $this->faker->numberBetween(0,30),
            'part_reject' => $this->faker->numberBetween(0,30),
            'verifikasi' => $this->faker->numberBetween(0,30),



        ];
    }
}
