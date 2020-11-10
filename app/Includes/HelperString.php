<?php

namespace App\Includes;
use Auth;
use DB;

class HelperString{

    /**
     * Образует множественную форму слова
     * @param int $number число
     * @param array $titles формы слова
     * @param boolean $return_number
     * @return string
     */
    static function plural($number, $titles, $return_number = true){
        $cases = array(2, 0, 1, 1, 1, 2);
        return ($return_number ? $number . " " : "") . $titles[($number % 100 > 4 && $number % 100 < 20) ? 2 : $cases[min($number % 10, 5)]];
    }

    /**
     * Конвертирует строку в camel case.
     * Пример: partner_offer_type => PartnerOfferType
     * Пример2: partner-offer-type => PartnerOfferType
     *
     * @param  string  $value
     * @return string
     */
    public static function camelCase($value){
        $value = ucwords(str_replace(['-', '_'], ' ', $value));
        return str_replace(' ', '', $value);
    }

    /**
     * Обрезает строку по разделителю, но не длиннее заданной длинны. Если длинна не задана, то возвращает пустую строку
     *
     * @param string $text
     * @param string $divider
     * @param bool $length
     *
     * @return string
     */
    static function cutByDivider($text, $divider="&nbsp;", $length=false){
        $return = "";
        $text = preg_replace('@(<figure.*?>).*?(</figure>)@s', '$1$2', $text);
        $text = strip_tags($text);
        if($length!==false && mb_strpos($text, $divider, null, "utf-8")!==false){
            $substr = mb_substr($text, 0, $length, "utf-8");
            $newLength = mb_strripos($substr, $divider, null, "utf-8");
            $return = mb_substr($text, 0, $newLength, "utf-8");
        }
        return $return;
    }

    /**
     * Возвращает пол
     *
     * @param string $code
     *
     * @return string
     */
    static function sex($code){
        switch($code){
            case("1"):
                $sex = "мужской";
                break;
            case("0"):
                $sex = "женский";
                break;
            default:
                $sex = "";
                break;
        }
        return $sex;
    }

    /**
     * Делает первую букву заглавной
     *
     * @param string $str
     *
     * @return string
     */
    static function ucfirst($str){
        $fc = mb_strtoupper(mb_substr($str, 0, 1, "utf-8"), "utf-8");
        return $fc.mb_substr($str, 1, null, "utf-8");
    }

    public static function onlyNumber($num)
    {
        $str = preg_replace('/[^0-9.]+/', '', $num);
        return (int)$str;
    }

    public static function userType() {
        $user_id = Auth::id();

        if($user_id) {
            $user = DB::table('users')->where('id',$user_id)->select('face')->first();
            return $user->face;
        } else {
            return;
        }

    }
    public static function truncate($string, $length = 150) {

        $limit = abs((int)$length);
        if(strlen($string) > $limit) {
            $string = preg_replace("/^(.{1,$limit})(\s.*|$)/s", '\1...', $string);
        }
        return $string;

    }
    /**
     * Генерация кейвордов из всякого
     *
     * @param string $title
     */
    static function getMetaKeywords($title)
    {
        $keywords = array();

        $titlePieces = explode(" ", $title); //разбиваем заголовок на слова
        foreach ($titlePieces as $k => $v) {
            if (mb_strlen(trim(str_replace(array(".", "!", ":", ",", "&nbsp;", "&laquo;", "&raquo;", "&mdash;", "&ndash;"), "", $v)), "utf-8") > 3) { //если слово больше 3 символов - в кейвордсы его
                $keywords[] = trim(str_replace(array(".", "!", ":", ",", "&nbsp;", "&laquo;", "&raquo;", "&mdash;", "&ndash;"), "", $v));
            }
        }

        if (func_num_args() > 1) { //если есть еще какие-то параметры кроме тайтла
            $args = func_get_args();
            array_shift($args); //убираем первый элемент - это тайтл
            foreach ($args as $k => $v) {
                if (is_array($v)) { //если параметр массив, то добавляем все значения длиннее 3 символов в кейвордсы
                    foreach ($v as $kk => $vv) {
                        if (!is_array($vv)) {
                            if (mb_strlen(trim(str_replace(array(".", "!", ":", ",", "&nbsp;", "&laquo;", "&raquo;", "&mdash;", "&ndash;"), "", $vv)), "utf-8") > 3) {
                                $keywords[] = trim(str_replace(array(".", "!", ":", ",", "&nbsp;", "&laquo;", "&raquo;", "&mdash;", "&ndash;"), "", $vv));
                            }
                        }
                    }
                } elseif (is_string($v)) { //если строка и она длиннее трех символов, то добавляем в кейвордсы
                    if (mb_strlen(trim(str_replace(array(".", "!", ":", ",", "&nbsp;", "&laquo;", "&raquo;", "&mdash;", "&ndash;"), "", $v)), "utf-8") > 3) {
                        $keywords[] = trim(str_replace(array(".", "!", ":", ",", "&nbsp;", "&laquo;", "&raquo;", "&mdash;", "&ndash;"), "", $v));
                    }
                }
            }
        }
        $result = implode(", ", $keywords); //склеиваем все кейвордсы через запятую
        return $result;
    }
}
