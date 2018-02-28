<?php

namespace Examples;

use RestControl\TestCase\AbstractTestCase;

class JsonPathTest extends AbstractTestCase
{
    /**
     * @test(
     *     title="Simple value - jsonPath",
     *     description="Validate simple value with jsonPath",
     *     tags="jsonPath simpleValue"
     * )
     */
    public function exampleSimpleValue()
    {
        return send()
            ->get('sample.service/users/1')
            ->expectedResponse()
            ->json()
            ->jsonPath('$.address.street', endsWith('Light'));
    }

    /**
     * @test(
     *     title="Simple value on elements list - jsonPath",
     *     description="Validate simple value with jsonPath on elements list",
     *     tags="jsonPath simpleValueList"
     * )
     */
    public function exampleSimpleValueOnList()
    {
        return send()
            ->get('sample.service/users')
            ->expectedResponse()
            ->json()
            ->jsonPath('$..company.constValue', endsWith('Value'));
    }

    /**
     * @test(
     *     title="Simple value on elements list - jsonPath",
     *     description="Validate simple value with jsonPath on elements list",
     *     tags="jsonPath simpleValueCallback"
     * )
     */
    public function exampleSimpleValueWithCallback()
    {
        return send()
                    ->get('sample.service/users')
                    ->expectedResponse()
                    ->json()
                    ->jsonPath('$..[?(@.id>1)]', function($value) {
                        return $value['id'] > 1;
                    });
    }
}