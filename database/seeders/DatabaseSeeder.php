<?php

namespace Database\Seeders;

use App\Models\Articles;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $this->call(UsersSeed::class);
/*         $this->call([
            CategoriesSeed::class, 
            ArticlesSeed::class 
        ]); */
    }
}
