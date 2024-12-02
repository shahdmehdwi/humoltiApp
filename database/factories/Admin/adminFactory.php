<?php

namespace Database\Factories\Admin;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Facades\Hash;


/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Admin\admin>
 */
class adminFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
          'name'=>'shahd',
          'email'=>'shahdelmehdawi2002@gmail.com',
          'password'=>Hash::make('154154'),
          ];
    }
}
