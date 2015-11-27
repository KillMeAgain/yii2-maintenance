<?php
/**
 * Created by PhpStorm.
 * User: Mr.You
 * Date: 2015-11-27
 * Time: 15:40
 */

namespace bigm\mainten\behaviors;

use yii\base\Application;
use yii\base\Behavior;
class Mainten extends Behavior
{
    public $owner;
    //������ʵ�ip
    public $allowIps;
    //Ĭ��Route
    public $offlinRoute = null;

    public function events(){
        return [
            Application::EVENT_BEFORE_ACTION   => 'beforeRequest'
        ];
    }

    public function beforeRequest(){
        echo "Hello";
    }
}