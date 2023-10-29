<?php 

use Morilog\Jalali\Jalalian;

function jalaliDate($date, $format = '%A,%d %B %Y %H:%M:%S')
{
    return Jalalian::forge($date)->format($format);
}