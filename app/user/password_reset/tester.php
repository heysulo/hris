<?php

function validateTime($date, $format = 'g:i A')
{
    $d = DateTime::createFromFormat($format, $date);
    return ($d && $d->format($format) == $date);
}
date_default_timezone_set('Asia/Colombo');
var_dump(validateTime('5:00 AM')); # false
echo time() - strtotime("2016-11-30 5:00 AM");