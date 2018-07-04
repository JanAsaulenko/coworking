<?php
/**
 * Created by PhpStorm.
 * User: yanki
 * Date: 28.02.18
 * Time: 20:00
 */

namespace App\Helpers;


class ParseDate
{
    public static function parseDateFormat($date){
        $date = date('Y-m-d h:m', strtotime($date));
        $date = str_replace(' ','T',$date);
        return $date;
    }
}