<?php

namespace Examples;

use RestControl\TestCase\AbstractTestCase;

class FilesTest extends AbstractTestCase
{
    /**
     * @test(
     *     title="Download png file.",
     *     tags="files png"
     * )
     */
    public function exampleGetPng()
    {
        return send()
            ->get($this->getVar('training') . '/plain/files/png')
            ->expectedResponse()
            ->contentTypeImagePng()
            ->size(66796);
    }

    /**
     * @test(
     *     title="Download png file.",
     *     tags="files css"
     * )
     */
    public function exampleGetCss()
    {
        return send()
            ->get($this->getVar('training') . '/plain/files/css')
            ->expectedResponse()
            ->contentTypeTextCss()
            ->size(31);
    }

    /**
     * @test(
     *     title="Download png file.",
     *     tags="files javascript"
     * )
     */
    public function exampleGetJavascript()
    {
        return send()
            ->get($this->getVar('training') . '/plain/files/js')
            ->expectedResponse()
            ->contentTypeTextJavascript()
            ->size(28);
    }

    /**
     * @test(
     *     title="Download png file.",
     *     tags="files csv"
     * )
     */
    public function exampleGetCsv()
    {
        return send()
            ->get($this->getVar('training') . '/plain/files/csv')
            ->expectedResponse()
            ->contentTypeTextCsv()
            ->size(69);
    }
}