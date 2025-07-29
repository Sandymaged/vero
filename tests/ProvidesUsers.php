<?php

namespace Tests;

use App\Domain\Interfaces\IUserEntity;
use App\Models\EmailValueObject;
use App\Models\PasswordValueObject;

trait ProvidesUsers
{
    public function userDataProvider()
    {
        return [
            'John DOE' => [
                'data' => [
                    'name' => "John DOE",
                    'email' => "john.doe@example.com",
                    'password' => "B1ggb055",
                ],
            ],
        ];
    }

    public function assertUserMatches(array $data, IUserEntity $user)
    {
        $this->assertEquals($data['name'], $user->getName());
        $this->assertTrue($user->getEmail()->isEqualTo(new EmailValueObject($data['email'])));
        $this->assertTrue($user->getPassword()->check(new PasswordValueObject($data['password'])));
    }
}
