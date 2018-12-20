<?php
namespace app\modules\mihuwai\models;
use Yii;

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
class CheckInModel
{
    public static function getInstance() {
        return new CheckInModel();
    }

    public function existPhoneNum($phoneNum) {
        $sql = "SELECT COUNT(*) FROM user WHERE phone_num = {$phoneNum}";

        $count = Yii::$app->db->createCommand($sql)->queryScalar();

        return $count > 0 ? true : false;

    }

    public function bothUserNameAndPhoneNumRight($phoneNum, $userName) {
        $sql = "SELECT COUNT(*) FROM user WHERE phone_num = {$phoneNum} AND user_name = '{$userName}'";

        $count = Yii::$app->db->createCommand($sql)->queryScalar();

        return $count > 0 ? true : false;
    }

    public function updateCheck($phoneNum, $userName) {
        $sql = "SELECT check_times FROM user WHERE phone_num = {$phoneNum}";

        $check_times = Yii::$app->db->createCommand($sql)->queryScalar();

        $check_times++;

        $sql = "UPDATE user SET check_times = {$check_times} WHERE phone_num = {$phoneNum} AND user_name = '{$userName}'";

        $ret = Yii::$app->db->createCommand($sql)->execute();

        return $ret > 0 ? true : false;
    }


    public function getUserInfo($phoneNum, $userName) {
        $sql = "SELECT * FROM user WHERE phone_num = {$phoneNum} AND user_name = '{$userName}'";

        return Yii::$app->db->createCommand($sql)->queryOne();
    }

    public function getUserInfoByName($userName) {
        $sql = "SELECT * FROM user WHERE user_name = '{$userName}'";

        return Yii::$app->db->createCommand($sql)->queryAll();
    }

    public function getUnCheckInUsers() {
        $sql = "SELECT * FROM user WHERE check_times = 0";

        return Yii::$app->db->createCommand($sql)->queryAll();
    }

    public function getCheckInUsers() {
        $sql = "SELECT * FROM user WHERE check_times <> 0 ORDER BY check_times DESC";

        return Yii::$app->db->createCommand($sql)->queryAll();
    }

    public function getUserCount($flag = '') {
        $sql = "SELECT COUNT(*) FROM user WHERE 1=1 ";
        if(!empty($flag)) {
            $sql .= $flag == 'checkIn' ? " AND check_times <> 0" : " AND check_times = 0";
        }
        return Yii::$app->db->createCommand($sql)->queryScalar();
    }
}