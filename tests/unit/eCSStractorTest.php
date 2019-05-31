<?php

namespace SpazzMarticus\eCSStractor;

/**
 * @uses \SpazzMarticus\eCSStractor\eCSStractor
 */
class eCSStractorTest extends \PHPUnit\Framework\TestCase
{
    protected $_eCSStractor;

    protected function setUp(): void
    {
        $this->_eCSStractor=new eCSStractor();
    }

    public function testLibxmlOptions()
    {
        $this->_eCSStractor->setLibxmlOptions(1025);
        $this->assertSame(1025, $this->_eCSStractor->getLibxmlOptions());
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
            [file_get_contents($path.'04.html'), $this->loadFormat($path.'04.css')],
        ];
    }

    public function loadFormat($file)
    {
        $format=file_get_contents($file);
        if (!$format)
        {
            return false;
        }
        /**
         * @see https://phpunit.readthedocs.io/en/8.1/assertions.html#assertstringmatchesformat
         * Replacing % by %% to work properly (e.g. width: 100%) , replacing whitespace by %w
         */
        return '%w'.preg_replace('/\s+/', '%w', preg_replace('/%/', '%%', $format)).'%w';
    }
}
