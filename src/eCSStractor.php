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

    /**
     * Extracts all CSS found in Style-Tags in the given HTML and returns it
     * @param string $html
     * @return string
     */
    public function extract($html)
    {
        $doc=new DOMDocument();
        $doc->loadHTML($html);

        $stylesheet='';

        $styleTags=$doc->getElementsByTagName('style');

        /* @var $styleTag DOMNode */
        foreach ($styleTags as $styleTag)
        {
            $stylesheet.=$styleTag->textContent;
        }

        return $stylesheet;
    }
}
