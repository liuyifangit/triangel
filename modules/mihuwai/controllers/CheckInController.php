<?php

namespace app\modules\mihuwai\controllers;

use app\controllers\AbstractWebController;
use app\modules\mihuwai\models\CheckInModel;
use app\vendor\web\Input;
use app\vendor\web\JsonMsg;

/**
 * description
 *
 * Copyright (C) 2017 by liuyifan. All rights reserved
 *
 * To contact the author write to {@link mailto:liuyifan3@xiaomi.com}
 *
 * @author 刘伊凡
 * @encoding UTF-8
 * @version $Id: CheckInController.php, v1.0 18/10/12 10:00 AM
 */
class CheckInController extends AbstractWebController
{

    public function actionIndex() {
        return $this->render('index');
    }

    public function actionIndexMobile() {
        return $this->render('index-mobile');
    }

    public function actionCheck() {
        $phone_num = Input::getInt('phone_num');
        $user_name = Input::getString('user_name');

        if(empty($user_name)){
            JsonMsg::Fail('姓名不能为空');
        }

        if(empty($phone_num)){
            JsonMsg::Fail('手机号为11位数字且手机号不能为空');
        }

        if(strlen($phone_num) != 11) {
            JsonMsg::Fail('手机号不是11位');
        }

        $checkInModel = CheckInModel::getInstance();

        if(!$checkInModel->existPhoneNum($phone_num)) {
            JsonMsg::Fail('手机号不存在,请联系领队');
        }

        if(!$checkInModel->bothUserNameAndPhoneNumRight($phone_num, $user_name)) {
            JsonMsg::Fail('姓名和手机号与报名信息不一致,请检查姓名的正确性');
        }

        if($checkInModel->updateCheck($phone_num, $user_name)) {

            $userInfo = $checkInModel->getUserInfo($phone_num, $user_name);

            JsonMsg::Success("当前签到次数为{$userInfo['check_times']}", $userInfo);
        }

    }


    public function actionGetUsers() {
        $pwd = Input::getString('pwd');
        $flag = Input::getString('flag');

        if($pwd != 'linruisen') {
            die('illegal operation');
        }
        $checkInModel = CheckInModel::getInstance();

        if(!in_array($flag, ['checkIn', 'unCheckIn', ''])) {
            die('illegal operation');
        }

        $users = $flag == 'checkIn' ? $checkInModel->getCheckInUsers() : $checkInModel->getUnCheckInUsers();
        $count = $checkInModel->getUserCount();
        $check_in = $checkInModel->getUserCount('checkIn');
        $un_check_in = $checkInModel->getUserCount('unCheckIn');
        $check_rate = round($check_in/$count, 4) * 100 . '%';

        return $this->render('users', [
            'users' => $users,
            'flag' => $flag,
            'content' => "本次参加人数: {$count}, 已签到: {$check_in}, 未签到: {$un_check_in}, 签到率: {$check_rate}",
        ]);
    }

    private function buidLayUitables($table_arr) {
        $data = [
            'code' => 0,
            'msg' => '',
            'count' => count($table_arr),
            'data' => $table_arr
        ];

        return json_encode($data);
    }



}
