<?php 

 $number = 1500;

 $digit = new NumberFormatter("en", NumberFormatter::SPELLOUT);
 return $digit->format($number);
