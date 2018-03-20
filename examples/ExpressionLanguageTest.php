<?php

namespace Examples;

use RestControl\TestCase\AbstractTestCase;

class ExpressionLanguageTest extends AbstractTestCase
{
    /**
     * @test(
     *     title="ExpressionLanguage - endsWith",
     *     description="Example of using endsWith helper",
     *     tags="expressionLanguage endsWith"
     * )
     */
    public function exampleEndsWith()
    {
        return send()
            ->get('sample.service/users/1')
            ->expectedResponse()
            ->json()
            ->jsonPath('$.address.street', endsWith('Light'))
            ->jsonPath('$.email', endsWith('incere@april.biz'))
            ->jsonPath('$.phone', endsWith('-770-736-8031 x56442'));
    }

    /**
     * @test(
     *     title="ExpressionLanguage - containsString",
     *     description="Example of using containsString helper",
     *     tags="expressionLanguage containsString"
     * )
     */
    public function exampleContainsString()
    {
        return send()
            ->get('sample.service/users/1')
            ->expectedResponse()
            ->json()
            ->jsonPath('$.address.street', containsString('ight'))
            ->jsonPath('$.phone', containsString('736-8031'))
            ->jsonPath('$.company.bs', containsString('harness'));
    }

    /**
     * @test(
     *     title="ExpressionLanguage - startsWith",
     *     description="Example of using startsWith helper",
     *     tags="expressionLanguage startsWith"
     * )
     */
    public function exampleStartsWith()
    {
        return send()
            ->get('sample.service/users/1')
            ->expectedResponse()
            ->json()
            ->jsonPath('$.address.street', startsWith('Kulas'))
            ->jsonPath('$.phone', startsWith('1-770-736'))
            ->jsonPath('$.company.catchPhrase', startsWith('Multi-layered client'));
    }
    /**
     * @test(
     *     title="ExpressionLanguage - equalsTo",
     *     description="Example of using equalsTo helper",
     *     tags="expressionLanguage equalsTo"
     * )
     */
    public function exampleEqualsTo()
    {
        return send()
            ->get('sample.service/users/1')
            ->expectedResponse()
            ->json()
            ->jsonPath('$.id', equalsTo(1))
            ->jsonPath('$.phone', equalsTo('1-770-736-8031 x56442'))
            ->jsonPath('$.company.catchPhrase', equalsTo('Multi-layered client-server neural-net'));
    }
}