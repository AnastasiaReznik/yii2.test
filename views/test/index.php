<?php use yii\widgets\ActiveForm;
use yii\helpers\Html;
use yii\widgets\Pjax;
 ?>
<div class="col-md-12">
    <h1>Страница с формой!</h1>

    <?php Pjax::begin(); ?>
    <?php if (Yii::$app->session->hasFlash('success')) : ?>
    <div class="alert alert-success" role="alert">
        <?= Yii::$app->session->getFlash('success'); ?>
    </div>
    <?php endif; ?>
    <?php $form = ActiveForm::begin([
        'id' => 'my-form',
        'options' => [
            'class' => 'form-horizontal',
            'data-pjax' => true, //data атрибут
        ],
        //конфигурация всей формы, оформление для всех полей
        'fieldConfig' => [
            'template' => " {label} \n <div class ='col-md-5'> {input} </div> \n <div class ='col-md-5'> {hint} </div> \n <div class ='col-md-5'> {error} </div>",
        'labelOptions' => ['class' => 'col-md-2']
        ]
    ]);?>
    <?= $form->field($model, 'name')->textInput(['placeholder' => 'Введите имя']) ?>


    <?= $form->field($model, 'email')->input('email', ['placeholder' => 'Введите email']); ?>

    <?= $form->field($model, 'topic')->textInput( ['placeholder' => 'Тема сообщения']); ?>



    <?= $form->field($model, 'text')->textarea(['rows' => 7,  'placeholder' => 'Введите текст']); ?>

    <div class="form-group">
        <div class="col-md-5 col-md-offset-2">
            <?= Html::submitButton('Отправить', ['class' => 'btn btn-default btn-block']); ?>
        </div>
    </div>

    <?php ActiveForm::end();?>
    <?php Pjax::end();?>
</div>


<?php 
// $js  = <<<JS
// var form  = $('#my-form');
// form.on('beforeSubmit', function() {
//     //берем данные из формы
//     var data = form.serialize();
//     $.ajax({
//         url: form.attr('action'),
//         type: 'POST',
//         data: data,
//         success: function (res) {
//             console.log(res);
//             form[0].reset();
//             // Implement successful
//         },
//         error: function() {
//             alert('Error!');
//         }
//      });
//      return false; // prevent default submit
//     });
// JS;

// $this->registerjS($js);
?>