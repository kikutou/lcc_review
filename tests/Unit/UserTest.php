<?php

namespace Tests\Unit;

use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;
use App\Model\User;
use Illuminate\Support\Facades\Hash;

class UserTest extends TestCase
{
    /**
     * A basic unit test example.
     *
     * @return void
     */
    public function testExample()
    {
        $this->assertTrue(true);
    }

    public function testSetPasswordMethodWithHash()
    {
      $user = new User;
      $user->setPassword("123456");
      $this->assertTrue($user->password != "123456");
    }

    public function testSetPasswordMethodGetSameHash()
    {
      $user1 = new User;
      $user1->setPassword("123456");

      $this->assertTrue(Hash::check("123456", $user1->password));
    }
}
