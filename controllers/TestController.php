<?php
namespace app\controllers;
use app\models\EntryForm;
use yii\web\View;

class TestController extends AppController
{
    // public $defaultAction = 'my-test';
    public $my_var;
    //установка шаблона для этого контроллера
    // public $layout = 'test';
    public function actionIndex($name = 'nastya', $age = 40)
    {
        //физический путь к папке web - D:/OSPanel/domains/yii2.test/web
        debug(\Yii::getAlias('@webroot'));
        //просто url /web
        debug(\Yii::getAlias('@web'));
        
        $this->my_var = 'my variable';
        $this->layout = 'test';
        $this->view->title = "Test Page";
        $this->view->registerMetaTag(['name' => 'description', 'content' => 'мета описание1'], 'description');

        // \Yii::$app->view->on(View::EVENT_END_BODY, function () {
        //     echo date('Y-m-d');
        // });

       \Yii::$app->view->params['test_param'] = 'Test param1';

        // \Yii::$app->view->params['t1'] = 'T1 params';
        // var_dump($name);
        // return $this->render('index');

        //передача в вид, 1 параметр - название вида, 2 параметр данные
        $model = new EntryForm();
        // return $this->render('index', compact('model'));
        return $this->render('index', compact('model','name', 'age'));

    }

    public function actionMyTest()
    {
        // $this->view->title = 'test';
        return $this->render('my-test');
    }


    public function actions()
    {
        return [
            // объявляет "test" действие с помощью названия класса, то есть описание этого action в классе HelloAction
            'test' => 'app\components\HelloAction',
        ];
    }
}