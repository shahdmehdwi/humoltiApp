<?php

namespace Database\Seeders;

use App\Models\Admin\Category;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class categorySeed extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Category::create([
            'type'=>'أثاث'
            ]
        );
        Category::create([
            'type'=>'مواد غذائية'
            ]
        );
        Category::create([
            'type'=>'مواد تنظيف'
            ]
        );
    }
}

