<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class AuthorsSeeder extends Seeder
{
    public function run(): void
    {
        
        $authors = [
            'J.K. Rowling',
            'J.R.R. Tolkien',
        ];

        
        foreach ($authors as $author) {
            DB::table('authors')->insert([
                'name' => $author,
            ]);
        }
    }
}