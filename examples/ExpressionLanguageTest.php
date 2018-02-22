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
        return $this->send()
            ->get('sample.service/users/1')
            ->expectedResponse()
            ->json()
            ->jsonPath('$.address.street', $this->endsWith('Light'))
            ->jsonPath('$.email', $this->endsWith('incere@april.biz'))
            ->jsonPath('$.phone', $this->endsWith('-770-736-8031 x56442'));
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
        return $this->send()
            ->get('sample.service/users/1')
            ->expectedResponse()
            ->json()
            ->jsonPath('$.address.street', $this->containsString('ight'))
            ->jsonPath('$.phone', $this->containsString('736-8031'))
            ->jsonPath('$.company.bs', $this->containsString('harness'));
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
        return $this->send()
            ->get('sample.service/users/1')
            ->expectedResponse()
            ->json()
            ->jsonPath('$.address.street', $this->startsWith('Kulas'))
            ->jsonPath('$.phone', $this->startsWith('1-770-736'))
            ->jsonPath('$.company.catchPhrase', $this->startsWith('Multi-layered client'));
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
        return $this->send()
            ->get('sample.service/users/1')
            ->expectedResponse()
            ->json()
            ->jsonPath('$.id', $this->equalsTo(1))
            ->jsonPath('$.phone', $this->equalsTo('1-770-736-8031 x56442'))
            ->jsonPath('$.company.catchPhrase', $this->equalsTo('Multi-layered client-server neural-net'));
    }
}