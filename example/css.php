<?php

require_once __DIR__.'/../vendor/autoload.php';

$html=file_get_contents(__DIR__.'/input.html');

$eCSStractor=new \SpazzMarticus\eCSStractor\eCSStractor();
$css=$eCSStractor->extract($html);

header("Content-type: text/css");
echo $css;
