<?php

/**
 * eCSStractor-Class
 */

namespace SpazzMarticus\eCSStractor;

use DOMDocument;
use DOMNode;

/**
 * eCSStractor - Extract CSS from HTML
 */
class eCSStractor
{
    protected $_libxmlOptions=0;

    /**
     * Returns the Libxml-Option-Setting used when parsing the HTML string
     * @return int
     */
    public function getLibxmlOptions()
    {
        return $this->_libxmlOptions;
    }

    /**
     * Sets the Libxml-Option-Setting used when parsing the HTML string
     * @link http://php.net/manual/en/libxml.constants.php
     * @param int $libxmlOptions
     * @return \SpazzMarticus\eCSStractor\eCSStractor
     */
    public function setLibxmlOptions($libxmlOptions)
    {
        $this->_libxmlOptions=$libxmlOptions;
        return $this;
    }

    /**
     * Extracts all CSS found in Style-Tags in the given HTML and returns it
     * @param string $html
     * @return string
     */
    public function extract($html)
    {
        $errorHandling=libxml_use_internal_errors(true);

        $doc=new DOMDocument();
        $doc->loadHTML($html, $this->_libxmlOptions);

        $stylesheet='';

        $styleTags=$doc->getElementsByTagName('style');

        /* @var $styleTag DOMNode */
        foreach ($styleTags as $styleTag)
        {
            $stylesheet.=$styleTag->textContent;
        }

        libxml_use_internal_errors($errorHandling);
        return $stylesheet;
    }
}
