<?php

namespace Examples;

use RestControl\TestCase\AbstractTestCase;

class HttpStatusCodesTest extends AbstractTestCase
{
    /**
     * @test(
     *     title="Check given httpCode.",
     *     description="Check httpCode with given value",
     *     tags="httpStatusCodes givenHttpCode"
     * )
     */
    public function exampleGivenHttpStatusCodes()
    {
        return send()
            ->get('sample.service/users/1')
            ->expectedResponse()
            ->httpCode(200);
    }

    /**
     * @test(
     *     title="Check httpCode via helper.",
     *     description="Check httpCode via helper",
     *     tags="httpStatusCodes httpCodeOkHelper"
     * )
     */
    public function exampleOkHelper()
    {
        return send()
            ->get('sample.service/users/1')
            ->expectedResponse()
            ->httpStatusOk();
    }
}