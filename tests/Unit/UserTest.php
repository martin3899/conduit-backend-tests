<?php

namespace Tests\Unit;

use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class UserTest extends TestCase
{
    use RefreshDatabase;
    protected $seed=true;
    public function construct(?string $name = null, array $data = [], $dataName = '')
    {
        parent::construct($name, $data, $dataName);
    }
    /**
     * A basic unit test example.
     *
     * @return void
     */
    public function test_example()
    {
        $this->assertTrue(true);
    }

    public function test_getRouteKeyNames()
    {   $user=User::find(1);
        $this->assertEquals('username',$user->getRouteKeyName());
    }
}
