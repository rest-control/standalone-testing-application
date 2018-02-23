<?php

namespace Examples;

use Examples\Objects\UserObject;
use RestControl\TestCase\AbstractTestCase;
use RestControl\Utils\ResponseItemsCollection;

class HasItemsTest extends AbstractTestCase
{
    /**
     * @test(
     *     title="Get example users.",
     *     description="Find example users with UserObject items collection validation.",
     *     tags="hasItems validateItems"
     * )
     */
    public function exampleGetUsers()
    {
        $userItemsCollection = new ResponseItemsCollection(UserObject::class);

        return $this->send()
            ->get('sample.service/users')
            ->expectedResponse()
            ->json()
            ->hasItems($userItemsCollection);
    }

    /**
     * @test(
     *     title="Get example users with required values.",
     *     description="Get example user with UserObject items collection validation and few required values.",
     *     tags="hasItems checkValues"
     * )
     */
    public function exampleGetUsersWithRequiredValues()
    {
        $userItemsCollection = new ResponseItemsCollection(UserObject::class);
        $userItemsCollection
            ->addItem(
                new UserObject([
                    'id'   => 1,
                    'name' => 'Leanne Graham',
                    'address' => [
                        'street' => 'Kulas Light',
                        'geo'    => [
                            'lat' => '-37.3159',
                            'lng' => '81.1496',
                        ],
                    ],
                ])
            )
            ->addItem(
                new UserObject([
                    'id'   => 2,
                    'name' => 'Ervin Howell',
                    'address' => [
                        'street' => 'Victor Plains',
                        'geo'    => [
                            'lat' => '-43.9509',
                            'lng' => '-34.4618',
                        ],
                    ],
                ])
            );

        return $this->send()
            ->get('sample.service/users')
            ->expectedResponse()
            ->json()
            ->hasItems($userItemsCollection);
    }
}