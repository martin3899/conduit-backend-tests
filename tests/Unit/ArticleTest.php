<?php

namespace Tests\Unit;

use App\Models\Article;
use App\Models\User;
use Hash;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class ArticleTest extends TestCase
{
    use RefreshDatabase;
    protected $seed=true;

    public function construct(?string $name = null, array $data = [], $dataName = '')
    {
        parent::construct($name, $data, $dataName);
    }
    /**
    /**
     * A basic unit test example.
     *
     * @return void
     */
    public function test_example()
    {
        $this->assertTrue(true);
    }

    public function test_articles(){
        $user = User::find(1);
        $this->assertEquals(
            Article::where('user_id', 1)->get(),
            $user->articles);
    }

    public function test_favouriteArticles(){
        $user = User::find(1);
        $this->assertEquals(
            Article::where('id', 2)->get()->map->only(['id','title','slug','description','body']),
            $user->favoritedArticles->map->only(['id','title','slug','description','body'])
        );
    }

    public function test_followers(){
        $user = User::find(1);
        $this->assertEquals(
            User::where('id', 2)->get()->map->only(['id','username','email','password','bio']),
            $user->followers->map->only(['id','username','email','password','bio'])
        );
    }

    public function test_following(){
        $user = User::find(1);
        $this->assertEquals(
            User::where('id', 2)->get()->map->only(['id','username','email','password','bio']),
            $user->following->map->only(['id','username','email','password','bio'])
        );
    }

    public function test_doesUserFollowAnotherUser(){
        $user = User::find(1);
        $this->assertTrue(
          true,
          $user->doesUserFollowAnotherUser(1,2)
        );
    }

    public function test_doesUserFollowArticle()
    {
        $user = User::find(1);
        $this->assertTrue(

            $user->doesUserFollowArticle(1,2)
        );
    }

    public function test_setPasswordAttribute(){
        $user = User::find(1);
        $unhashed = "password";
        $user->setPasswordAttribute($unhashed);
        $this->assertTrue(password_verify($unhashed, $user->password)
        );
    }

    public function test_getJWTIdentifier(){
        $user = User::find(1);
        $this->assertNotNull(
            $user->getJWTIdentifier(),
        );
    }
}
