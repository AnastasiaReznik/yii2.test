<?php
namespace app\components;
use yii\base\Action;

class HelloAction extends Action
{
    //обязательный метод
    public function run()
    {
        return "Hello World";
    }
}
