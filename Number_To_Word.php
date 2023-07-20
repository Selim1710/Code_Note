<?php

$number = 1500;

$digit = new NumberFormatter("en", NumberFormatter::SPELLOUT);
return $digit->format($number);

//  Note: extension=php_intl.dll - must have into php.ini file
