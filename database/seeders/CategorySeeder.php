<?php

namespace Database\Seeders;
use App\Models\Category;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CategorySeeder extends Seeder
{
   use HasFactory;
    public function run(): void
    {
        //
        Category::factory()->count(10)->create();
    }
}
