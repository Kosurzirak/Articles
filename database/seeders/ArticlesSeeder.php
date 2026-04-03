<?php

namespace Database\Seeders;
use App\Models\Article;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ArticlesSeeder extends Seeder
{
  use HasFactory;

    public function run(): void
    {
        Article::factory()->count(50)->create();
    }
}
