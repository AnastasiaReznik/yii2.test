<?php
namespace app\controllers;

use app\models\Country;
use app\models\EntryForm;
use yii\web\Response;
use yii\widgets\ActiveForm;

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
                             //ajax обработка
            // $model->load(Yii::$app->request->post());
            // if (\Yii::$app->request->isAjax) {
            //     \Yii::$app->response->format = Response::FORMAT_JSON;
            //     if ($model->validate()) {
            //         return ['message' => 'Ok'];
            //     } else {
            //         //массив ошибок валидации
            //         return ActiveForm::validate($model);
            //     }
            //     // return ActiveForm::validate($model);
            // }


                        //pjax обработка
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



    public function actionView()
    {
        $this->view->title = 'model page';
        $this->layout = 'test';

        $model = new Country();

        // $countries = $model->find()->all();
        // $countries = $model->find()->where("population  < 100000000 AND code <> 'AU'")->all();
        // $countries = $model->find()->where("population  < :population AND code <> :code", [':code' => 'AU',  ':population' => '100000000'])->all();

            //формат массива
        // $countries = $model->find()->where([
        //     'code' => ['DE', 'FR', 'GB'],
        //     'status' => '1'
        //     ])->all();

        // $countries = $model->find()->where(['like', 'name', 'ni'])->all();

        //сортировка
        // $countries = $model->find()->orderBy('population DESC')->all();

        //количество записей
        // $countries = $model->find()->count();

        //получить одну запись первую. выбирает все, но выводит только первую, нужно добавит LIMIT
        // $countries = $model->find()->limit('1')->where(['code' => 'CN'])->one();

        //ДЛЯ ПОИСКА ПО КЛЮЧУ то есть по id используется findOne findAll
        // $countries = $model->findOne('BR');
        // $countries = $model->findAll(['BR','RU', 'US']);

        //вернуть данные лучше как масиив, меньше памяти съедает
        // $countries = $model->find()->asArray()->all();

        //построить сложный запрос
        // $sql = 'SELECT * FROM custimer WHERE status =:status';
        // $customer = Customer::findBySql($sql, [':status' => Customer::STATUS_INACTIVE])->all();


        return $this->render('view', compact('model', 'countries'));
    }




    public function actionCreate()
    {
        $this->layout = 'test';
        $this->view->title = 'create page';

        //создание модели и заполнение данными
        $country = new Country();
        if (\Yii::$app->request->isAjax) {
            $country->load(\Yii::$app->request->post());
            \Yii::$app->response->format = Response::FORMAT_JSON;
            return ActiveForm::validate($country);
        }
         if ($country->load(\Yii::$app->request->post()) AND $country->save()) {
            \Yii::$app->session->setFlash('success', 'ok');
            return $this->refresh();
        } else {
            \Yii::$app->session->setFlash('error', 'ok');
        }

        // $country->code = 'UA';
        // $country->name = 'Ukraine';
        // $country->population = 41840000;
        // $country->status = 1;

        // if ($country->save()) {
        //     \Yii::$app->session->setFlash('success', 'ok');
        // } else {
        //     \Yii::$app->session->setFlash('error', 'ok');
        // }
        return $this->render('create', compact('country'));
    }

    public function actionUpdate()
    {
        $this->layout = 'test';
        $this->view->title = 'update page';

        // $country = Country::findOne('UA');
        // if (!$country) {
        //     throw new NotFoundHttpException('Country not found');

        // }
        $this->render('update');
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