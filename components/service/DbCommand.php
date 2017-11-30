<?php
/**
 * Created by PhpStorm.
 * User: liuyifan
 * Date: 30/11/17
 * Time: 下午 05:23
 */

namespace app\components\system;


use Exception;
use yii\db\Command;

/**
 * Class Command
 * @package app\components
 * 解决mysql-gone-away 2006,2013的问题
 */
class DbCommand extends Command
{
    const SLEEP_TIME = 60;

    /***
     * @return int
     * @throws Exception
     * 所有[增删改]操作调用
     */
    public function execute()
    {
        try {
            return parent::execute();
        } catch (Exception $e) {
            if ($e->errorInfo[1] == 2006 || $e->errorInfo[1] == 2013) {
                echo '[Mysql-'.$e->errorInfo[1].'] problem handler with app\components\Command execute()...'.PHP_EOL;
                $this->db->close();
                $this->db->open();
                $this->pdoStatement = null ;
                sleep(self::SLEEP_TIME);
                return parent::execute();
            }else{
                throw $e;
            }
        }
    }


    /***
     * @param string $method
     * @param null $fetchMode
     * @return mixed
     * @throws Exception
     * 所有[查操作]都会调用queryInternal方法
     */
    protected function queryInternal($method, $fetchMode = null){
        try {
            return parent::queryInternal($method, $fetchMode);
        } catch (Exception $e) {
            if ($e->errorInfo[1] == 2006 || $e->errorInfo[1] == 2013) {
                echo '[Mysql-'.$e->errorInfo[1].'] problem handler with app\components\Command queryInternal()...'.PHP_EOL;
                $this->db->close();
                $this->db->open();
                $this->pdoStatement = null ;

                sleep(self::SLEEP_TIME);
                return parent::queryInternal($method, $fetchMode);
            }else{
                throw $e;
            }
        }
    }
}