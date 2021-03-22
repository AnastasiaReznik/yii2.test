<div class="col-md-12">
    <h1><?= $this->title; ?></h1>
    <?php

        use yii\helpers\Html;
        use yii\widgets\ActiveForm;

if (Yii::$app->session->hasFlash('success')) : ?>
    <div class="alert alert-success" role="alert">
        <?= Yii::$app->session->getFlash('success'); ?>
    </div>
    <?php endif; ?>

    <?php if (Yii::$app->session->hasFlash('error')) : ?>
    <div class="alert alert-danger" role="alert">
        <?= Yii::$app->session->getFlash('success'); ?>
    </div>
    <?php endif; ?>


    <?php $form = ActiveForm::begin([
        'id' => 'my-form',
        'options' => [
            'class' => 'form-horizontal',
        ],
        //конфигурация всей формы, оформление для всех полей
        'fieldConfig' => [
            'template' => " {label} \n <div class ='col-md-5'> {input} </div> \n <div class ='col-md-5'> {hint} </div> \n <div class ='col-md-5'> {error} </div>",
        'labelOptions' => ['class' => 'col-md-2']
        ]
    ]);?>

    <?= $form->field($country, 'name'); ?>
    <?= $form->field($country, 'population'); ?>
    <?= $form->field($country, 'status')->checkbox([
            'template' => " {label} \n <div class ='col-md-5'> {input} </div> \n <div class ='col-md-5'> {hint} </div> \n <div class ='col-md-5'> {error} </div>",
        'labelOptions' => ['class' => 'col-md-2']
    ], false); ?>
    <div class="form-group">
        <div class="col-md-5 col-md-offset-2">
            <?= Html::submitButton('Отправить', ['class' => 'btn btn-default btn-block']); ?>
        </div>
    </div>
    <?php ActiveForm::end();?>
</div>