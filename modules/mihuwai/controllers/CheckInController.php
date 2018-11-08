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

    public function actionCheck() {
        $phone_num = Input::getInt('phone_num');
        $user_name = Input::getString('user_name');

        if(empty($user_name)){
            JsonMsg::Fail('姓名不能为空');
        }

        if(empty($phone_num)){
            JsonMsg::Fail('手机号不能为空');
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

        if($checkInModel->updateCheck($phone_num)) {

            $userInfo = $checkInModel->getUserInfo($phone_num);

            JsonMsg::Success("当前签到次数为{$userInfo['check_times']}", $userInfo);
        }

    }

    public function actionGetUserInfo() {
        $checkInModel = CheckInModel::getInstance();

        $phone_num = Input::getInt('phone_num');

        $userInfo = $checkInModel->getUserInfo($phone_num);
        return $this->render('user-info', [
            'userInfo' => $userInfo
        ]);

    }

    public function actionGetUsers() {
        $pwd = Input::getString('pwd');

        if($pwd != 'linruisen') {
            die('illegal operation');
        }
        $checkInModel = CheckInModel::getInstance();

        $users = $checkInModel->getUsers();

        return $this->render('users', [
            'pwd' => $pwd,
            'user' => $this->buidLayUitables($users)

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
