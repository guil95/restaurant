<?php

namespace Tests\Customer;


use App\App\Infra\DAO\User;
use App\Domain\User\UserService;
use App\Domain\User\Exception\UserNotFound;
use PHPUnit\Framework\TestCase;


class CustomerServiceTest extends TestCase
{
    public function testFindAllEmpty()
    {
        self::expectException(UserNotFound::class);
        $customerDAO = $this->getMockBuilder(User::class)
            ->disableOriginalConstructor()
            ->getMock();

        $customerDAO->method('findAll')
            ->will($this->returnValue([]));


        $costumerService = new UserService(
            $customerDAO
        );

        $costumerService->findAll();
    }

    public function testFindAllNotEmpty()
    {
        $customerDAO = $this->getMockBuilder(User::class)
            ->disableOriginalConstructor()
            ->getMock();

        $costumers = [
            'name' => 'Guilherme'
        ];

        $customerDAO->method('findAll')
            ->will(
                $this->returnValue($costumers)
            );

        $costumerService = new UserService(
            $customerDAO
        );

        $result = $costumerService->findAll();

        $this->assertEquals($costumers, $result);
    }
}
