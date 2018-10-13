<?php
/**
 * Created by PhpStorm.
 * User: liuyifan
 * Date: 27/04/17
 * Time: 下午 02:17
 */

namespace app\vendor\web;


class Input
{
    /**
     * float
     * @param $key
     * @param null $default
     * @return int|null
     */
    public static function getFloat($key, $default = null)
    {
        if (isset($_REQUEST[$key]))
        {
            return (float) $_REQUEST[$key];
        }
        else
        {
            return $default;
        }
    }


    /**
     * 取得到的int
     * @param $key
     * @param null $default
     * @return int|null
     */
    public static function getInt($key, $default = null)
    {
        if (isset($_REQUEST[$key]))
        {
            return (int) $_REQUEST[$key];
        }
        else
        {
            return $default;
        }
    }

    /**
     * 取得到的字符串
     * @param $key
     * @param null $default
     * @return null|string
     */
    public static function getString($key, $default = null)
    {
        if (isset($_REQUEST[$key]))
        {
            return trim((string) $_REQUEST[$key]);
        }
        else
        {
            return $default;
        }
    }

    public static function getMonth()
    {
       return self::getInt('month',date('Ym'));
    }

}