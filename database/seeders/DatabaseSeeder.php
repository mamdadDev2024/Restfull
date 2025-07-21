<?php

namespace Database\Seeders;

use App\Models\Article;
use App\Models\Comment;
use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $admin = User::factory()->create([
            'user_name' => 'admin',
            'email' => 'admin@gmail.com',
            'password' => '123456'
        ]);

        $users = User::factory(10)->create();

        $users->each(fn($user) => Article::factory(10)->create(['user_id' => $user->id])
            ->each(fn ($article) => Comment::factory(10)->create(['article_id' => $article->id , 'user_id' => $user->id])));

    }
}
