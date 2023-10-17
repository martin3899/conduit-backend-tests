<?php

namespace Database\Seeders;

use App\Models\Article;
use App\Models\Comment;
use App\Models\Tag;
use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;


class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
//        DB::table('users')->insert([
//            'username' => 'Rose',
//            'email' => 'rose@mail.com',
//            'password' => Hash::make('pwd'),
//            'bio' => 'Je voudrais devenir enseignante pour enfants',
//        ]);
//        DB::table('users')->insert([
//            'username' => 'Musonda',
//            'email' => 'musonda@mail.com',
//            'password' => Hash::make('pwd2'),
//            'bio' => 'Je songe à devenir infirmière, j’écris mes réflexions',
//        ]);
//
//        DB::table('articles')->insert([
//            'title' => 'Article Rose',
//            'user_id'  => 1,
//            'slug' => 'Slug Rose',
//            'description' => 'Description Rose',
//            'body' => 'Body Rose',
//        ]);
//        DB::table('articles')->insert([
//            'title' => 'Article Musonda 1',
//            'user_id'  => 2,
//            'slug' => 'Slug Musonda 1',
//            'description' => 'Description Musonda 1',
//            'body' => 'Body Musonda 1',
//        ]);
//        DB::table('articles')->insert([
//            'title' => 'Article Musonda 2',
//            'user_id'  => 2,
//            'slug' => 'Slug Musonda 2',
//            'description' => 'Description Musonda 2',
//            'body' => 'Body Musonda 2',
//        ]);
//
//        DB::table('tags')->insert([
//            'name' => 'éducation',
//        ]);
//
//        DB::table('comments')->insert([
//            'body' => "J'adore ta manière de concevoir l’éducation des enfants",
//            'user_id' => 2,
//            'article_id' => 1
//        ]);
//
//
//
//        DB::table('followers')->insert([
//            'follower_id' => 1,
//            'following_id' => 2
//        ]);
//
//        DB::table('followers')->insert([
//            'follower_id' => 2,
//            'following_id' => 1
//        ]);
//
//        DB::table('article_user')->insert([
//            'article_id' => 1,
//            'user_id' => 1
//        ]);
//
//        DB::table('article_user')->insert([
//            'article_id' => 2,
//            'user_id' => 2
//        ]);
//
//        DB::table('article_user')->insert([
//            'article_id' => 3,
//            'user_id' => 2
//        ]);
//
//        DB::table('article_tag')->insert([
//            'article_id' => 1,
//            'tag_id' => 1
//        ]);



        $rose = User::create([
            'username' => 'Rose',
            'email' => 'rose@mail.com',
            'password' => Hash::make('pwd'),
            'bio' => 'Je voudrais devenir enseignante pour enfants',
        ]);



        $musonda = User::create([
            'username' => 'Musonda',
            'email' => 'musonda@mail.com',
            'password' => Hash::make('pwd2'),
            'bio' => 'Je songe à devenir infirmière, j’écris mes réflexions',
        ]);

        $articles1 = Article::create([
            'title' => 'Article Rose',
            'user_id'  => 1,
            'slug' => 'Slug Rose',
            'description' => 'Description Rose',
            'body' => 'Body Rose',
        ]);

        $articles2 = Article::create([
            'title' => 'Article Musonda 1',
            'user_id'  => 2,
            'slug' => 'Slug Musonda 1',
            'description' => 'Description Musonda 1',
            'body' => 'Body Musonda 1',
        ]);

        $articles3 = Article::create([
            'title' => 'Article Musonda 2',
            'user_id'  => 2,
            'slug' => 'Slug Musonda 2',
            'description' => 'Description Musonda 2',
            'body' => 'Body Musonda 2',
        ]);

        $tag = Tag::create([
            'name' => 'éducation',
        ]);

        $comment = Comment::create([
            'body' => "J'adore ta manière de concevoir l’éducation des enfants",
            'user_id' => 2,
            'article_id' => 1
        ]);

        $rose->articles()->save($articles1);
        $musonda->articles()->save($articles2);
        $musonda->articles()->save($articles3);
//        $articles1->users()->associate($rose)->save();
//        $articles2->users()->associate($musonda)->save();
//        $articles3->users()->associate($musonda)->save();
//        $articles2 = $rose->articles2;                // Pareil qu'au dessus
//        $articles3 = $rose->articles3;



        $articles1->tags()->attach($tag);



        $articles1->comments()->save($comment);

        $rose->following()->attach($musonda);
        $rose->followers()->attach($musonda);

        $rose->favoritedArticles()->attach($articles2);
        $musonda->favoritedArticles()->attach($articles1);
    }
}
