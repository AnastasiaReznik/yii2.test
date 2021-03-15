<?php
namespace app\controllers;
use app\models\EntryForm;

class TestController extends AppController
{
    // public $defaultAction = 'my-test';
    // public $my_var;
    //установка шаблона для этого контроллера
    // public $layout = 'test';
    public function actionIndex($name = 'nastya', $age = 40)
    {
        $this->layout = 'test';
        $this->view->title = "Test Page";
        $this->view->registerMetaTag(['name' => 'description', 'content' => 'мета описание', 'description']);
        // \Yii::$app->view->on(View::EVENT_END_BODY, function () {
        //     echo date('Y-m-d');
        // });

        // $this->my_var = 'my variable';
    //    debug(\Yii::$app);

        // \Yii::$app->view->params['t1'] = 'T1 params';
        $this->view->params['t1'] = 'T1 params';
        // var_dump($name);
        // return $this->render('index');

        //передача в вид, 1 параметр - название вида, 2 параметр данные
        $model = new EntryForm();
        return $this->render('index', compact('model'));

    }

    public function actionMyTest()
    {
        // $this->view->title = 'test';
        return $this->render('my-test');
    }
}