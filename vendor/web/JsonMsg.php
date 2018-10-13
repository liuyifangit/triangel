<?php
/**
 * description
 *
 * Copyright (C) 2017 by liuyifan. All rights reserved
 *
 * To contact the author write to {@link mailto:liuyifan3@xiaomi.com}
 *
 * @author 刘伊凡
 * @encoding UTF-8
 * @version $Id: xx.php, v1.0 12/12/26 10:00 AM
 */

namespace app\vendor\web;


class JsonMsg
{
    const SUCCESS_CODE = 0;

    const FAIL_CODE = 1;

    public static function Success($msg = '', $data = []) {
        self::Formatter2Json($data, $msg,self::SUCCESS_CODE);
    }

    public static function Fail($msg = '', $data = []) {
        self::Formatter2Json($data, $msg,self::FAIL_CODE);
    }

    public static function Formatter2Json($data, $msg, $code)
    {
        $results = array();
        $results['code'] = $code;
        $results['msg'] = $msg;
        $results['data'] = $data;
        echo json_encode($results);
        exit(0);
    }
}