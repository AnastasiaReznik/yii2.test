<?php use yii\widgets\ActiveForm; ?>
<?php use yii\helpers\Html; ?>
<div class="col-md-6">
    <h1>Страница с формой!</h1>
    <?php $form = ActiveForm::begin();?>
    <?= $form->field($model, 'name'); ?>
    <?= $form->field($model, 'email'); ?>
    <?= $form->field($model, 'text')->textarea(['rows' => 10]); ?>
    <div class="form-group">
    <?= Html::submitButton('Отправить', ['class' => 'btn btn-default']); ?>
    </div>

    <?php $form = ActiveForm::end();?>
</div>


