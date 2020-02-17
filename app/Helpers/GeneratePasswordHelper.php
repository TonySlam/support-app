<?php
/**
 * Created by PhpStorm.
 * User: Slamtony
 * Date: 2019/10/15
 * Time: 2:17 PM
 */

namespace App\Helpers;


class GeneratePasswordHelper
{

    public static function generatePassword ($length = 8)
    {
        $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
        $charactersLength = strlen($characters);
        $randomString = '';
        for ($i = 0; $i < $length; $i++) {
            $randomString .= $characters[rand(0, $charactersLength - 1)];
        }
        return $randomString;
    }

}