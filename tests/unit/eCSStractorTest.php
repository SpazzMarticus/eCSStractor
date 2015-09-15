<?php

namespace SpazzMarticus\eCSStractor;

/**
 * @uses \SpazzMarticus\eCSStractor\eCSStractor
 */
class eCSStractorTest extends \PHPUnit_Framework_TestCase
{
    protected $_eCSStractor;

    protected function setUp()
    {
        $this->_eCSStractor=new eCSStractor();
    }

    /**
     * @dataProvider providerExtract
     * @covers \SpazzMarticus\eCSStractor\eCSStractor::extract
     */
    public function testExtract($html, $cssFormat)
    {
        $this->assertStringMatchesFormat($cssFormat, $this->_eCSStractor->extract($html));
    }

    public function providerExtract()
    {
        $path=__DIR__.'/../fixtures/';
        return [
            ['plaintext', ''],
            [123.2123, ''],
            [file_get_contents($path.'01.html'), $this->loadFormat($path.'01.css')],
            [file_get_contents($path.'02.html'), $this->loadFormat($path.'02.css')],
            [file_get_contents($path.'03.html'), $this->loadFormat($path.'03.css')],
        ];
    }

    public function loadFormat($file)
    {
        $format=file_get_contents($file);
        if (!$format)
        {
            return false;
        }
        return '%w'.preg_replace('/\s/', '%w', $format).'%w';
    }
}
