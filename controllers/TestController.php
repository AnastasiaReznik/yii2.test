<?php
namespace app\controllers;
use app\models\EntryForm;
use Yii;

class TestController extends AppController
{
    // public $defaultAction = 'my-test';
    // public $my_var;
    //установка шаблона для этого контроллера
    // public $layout = 'test';
    public function actionIndex()
    {
        //физический путь к папке web - D:/OSPanel/domains/yii2.test/web
        // debug(\Yii::getAlias('@webroot'));
        //просто url /web
        // debug(\Yii::getAlias('@web'));

        $this->layout = 'test';
        $this->view->title = "Test Page";
        $this->view->registerMetaTag(['name' => 'description', 'content' => 'мета описание1'], 'description');

       \Yii::$app->view->params['test_param'] = 'Test param1';


        //передача в вид, 1 параметр - название вида, 2 параметр данные
        $model = new EntryForm();
        //если данные пришли из POST и форма прошла валидацию
        if ($model->load(\Yii::$app->request->post()) && $model->validate())
        {
            //если данные присланы через пиджакс
            // if(\Yii::$app->request->isPjax) {
            //    //записать в сессию флэш сообщение, success цвет сообщения
            //    \Yii::$app->session->setFlash('success', 'Данные приняты PJAX');
            //    //чтобы очистить форму надо новый пустой объект
            //    $model = new EntryForm();
            // } else {
            //     \Yii::$app->session->setFlash('success', 'Данные приняты NO PJAX');
                return $this->refresh();
            // }

        }

        return $this->render('index', compact('model'));

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