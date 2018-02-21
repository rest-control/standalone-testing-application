<?php

namespace Examples;

use Examples\Objects\UserObject;
use RestControl\TestCase\AbstractTestCase;

class GetUserTest extends AbstractTestCase
{
    /**
     * @test(
     *     title="Find example user.",
     *     description="Find example user with UserObject item validation.",
     *     tags="get users"
     * )
     */
    public function exampleFindUser()
    {
        $userItem = new UserObject();

        return $this->send()
                    ->get('https://jsonplaceholder.typicode.com/users/1')
                    ->expectedResponse()
                    ->json()
                    ->hasItem($userItem);
    }

    /**
     * @test(
     *     title="Find example user with required values.",
     *     description="Find example user with UserObject item validation and few required values.",
     *     tags="get users requiredValues"
     * )
     */
    public function exampleFindUser1WithRequiredValues()
    {
        $userItem = new UserObject([
            'id'   => 1,
            'name' => 'Leanne Graham',
            'address' => [
                'street' => 'Kulas Light',
                'geo'    => [
                    'lat' => '-37.3159',
                    'lng' => '81.1496',
                ],
            ],
        ]);

        return $this->send()
            ->get('https://jsonplaceholder.typicode.com/users/1')
            ->expectedResponse()
            ->json()
            ->hasItem($userItem);
    }

    /**
     * @test(
     *     title="Find example user with required values.",
     *     description="Find example user with UserObject item validation only with given values. This test should fail.",
     *     tags="get users requiredValues"
     * )
     */
    public function exampleFindUser1WithOnlyGivenRequiredValuesFails()
    {
        $userItem = new UserObject([
            'id'   => 1,
            'name' => 'Leanne Graham',
        ]);

        return $this->send()
            ->get('https://jsonplaceholder.typicode.com/users/1')
            ->expectedResponse()
            ->json()
            ->hasItem($userItem, null, true);
    }
}