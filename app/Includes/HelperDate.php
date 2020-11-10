<?php
/**
 * Created by IntelliJ IDEA.
 * User: tikken
 * Date: 10.11.2020
 * Time: 08:44
 */

namespace App\Includes;
use DateTime;

class HelperDate
{
    public function getTommorrowWithMonth()
    {
        $datetime = new DateTime('tomorrow');

        $arr = [
            'январь',
            'февраль',
            'март',
            'апрель',
            'май',
            'июнь',
            'июль',
            'август',
            'сентябрь',
            'октябрь',
            'ноябрь',
            'декабрь'
        ];

        $month = date('n')-1;

        $str = $arr[$month].' '.$datetime->format('d, Y');

        return $str;
    }
}
