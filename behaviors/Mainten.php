<?php
/**
 * Created by PhpStorm.
 * User: Mr.You
 * Date: 2015-11-27
 * Time: 15:40
 */

namespace bigm\mainten\behaviors;

use Yii;
use yii\base\Application;
use yii\base\Behavior;
class Mainten extends Behavior
{
    //维护模式，默认关闭
    public $maintenance = false;
    //允许访问的ip
    public $allowIps;
    //默认Route
    public $offlinUrl = null;

    public function init(){
        parent::init();
        //检查配置
        if($this->offlinUrl !== null){
        }
    }
    public function events(){
        return [
            Application::EVENT_BEFORE_REQUEST  => 'beforeRequest'
        ];
    }

    public function beforeRequest(){
        if($this->maintenance) {
            if($this->checkIps()){
                return;
            }
            $response = Yii::$app->response;
            $response->setStatusCode(503);
            if($this->offlinUrl != null){
                //$response->content = file_get_contents($this->offlinUrl);
            } else {
                $response->content = file_get_contents(Yii::getAlias('@bigm/mainten') . '/maintenance.html');
            }
            $response->send();
            exit();
        }
        return true;
    }

    private function checkIps(){
        $ip = Yii::$app->request->getUserIP();
        if(in_array($ip,$this->allowIps)){
            return true;
        }
        return false;
    }
}