<?php

namespace app\helpers;

class Transliteration
{

    public static function url($str)
    {
        // ГОСТ 7.79B
        $transliteration = array(
            'А' => 'a', 'а' => 'a',
            'Б' => 'b', 'б' => 'b',
            'В' => 'v', 'в' => 'v',
            'Г' => 'g', 'г' => 'g',
            'Д' => 'd', 'д' => 'd',
            'Е' => 'e', 'е' => 'e',
            'Ё' => 'yo', 'ё' => 'yo',
            'Ж' => 'zh', 'ж' => 'zh',
            'З' => 'z', 'з' => 'z',
            'И' => 'i', 'и' => 'i',
            'Й' => 'j', 'й' => 'j',
            'К' => 'k', 'к' => 'k',
            'Л' => 'l', 'л' => 'l',
            'М' => 'm', 'м' => 'm',
            'Н' => "n", 'н' => 'n',
            'О' => 'o', 'о' => 'o',
            'П' => 'p', 'п' => 'p',
            'Р' => 'r', 'р' => 'r',
            'С' => 's', 'с' => 's',
            'Т' => 't', 'т' => 't',
            'У' => 'u', 'у' => 'u',
            'Ф' => 'f', 'ф' => 'f',
            'Х' => 'h', 'х' => 'h',
            'Ц' => 'cz', 'ц' => 'cz',
            'Ч' => 'ch', 'ч' => 'ch',
            'Ш' => 'sh', 'ш' => 'sh',
            'Щ' => 'shh', 'щ' => 'shh',
            'Ъ' => '', 'ъ' => '',
            'Ы' => 'y', 'ы' => 'y',
            'Ь' => '', 'ь' => '',
            'Э' => 'e', 'э' => 'e',
            'Ю' => 'yu', 'ю' => 'yu',
            'Я' => 'ya', 'я' => 'ya',
            ' ' => '-',
        );

        $res = strtr($str, $transliteration);
        $res = mb_strtolower($res, 'UTF-8');
        $res = preg_replace('/[^0-9a-z\-_]/', '', $res);
        $res = preg_replace('|([-]+)|s', '-', $res);
        $res = trim($res, '-');

        return $res;
    }

    public static function text($str)
    {
        // ГОСТ 7.79B
        $transliteration = array(
            'А' => 'A', 'а' => 'a',
            'Б' => 'B', 'б' => 'b',
            'В' => 'V', 'в' => 'v',
            'Г' => 'G', 'г' => 'g',
            'Д' => 'D', 'д' => 'd',
            'Е' => 'E', 'е' => 'e',
            'Ё' => 'Yo', 'ё' => 'yo',
            'Ж' => 'Zh', 'ж' => 'zh',
            'З' => 'Z', 'з' => 'z',
            'И' => 'I', 'и' => 'i',
            'Й' => 'Y', 'й' => 'y',
            'К' => 'K', 'к' => 'k',
            'Л' => 'L', 'л' => 'l',
            'М' => 'M', 'м' => 'm',
            'Н' => "N", 'н' => 'n',
            'О' => 'O', 'о' => 'o',
            'П' => 'P', 'п' => 'p',
            'Р' => 'R', 'р' => 'r',
            'С' => 'S', 'с' => 's',
            'Т' => 'T', 'т' => 't',
            'У' => 'U', 'у' => 'u',
            'Ф' => 'F', 'ф' => 'f',
            'Х' => 'H', 'х' => 'h',
            'Ц' => 'Cz', 'ц' => 'cz',
            'Ч' => 'Ch', 'ч' => 'ch',
            'Ш' => 'Sh', 'ш' => 'sh',
            'Щ' => 'Sch', 'щ' => 'sch',
            'Ъ' => '', 'ъ' => '',
            'Ы' => 'Y', 'ы' => 'y',
            'Ь' => '', 'ь' => '',
            'Э' => 'E', 'э' => 'e',
            'Ю' => 'Yu', 'ю' => 'yu',
            'Я' => 'Ya', 'я' => 'ya',
        );

        $res = strtr($str, $transliteration);

        return $res;
    }

}
