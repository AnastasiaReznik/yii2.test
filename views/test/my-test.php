<?php
$this->title = 'тестовая страница';
$this->registerMetaTag(['name' => 'description', 'content' => 'мета  описание2'], 'description');
?>

<?php //$this->registerCssFile('@web/css/styles.css' , ['depends' => 'yii\bootstrap\BootstrapAsset']); ?>

<?php
$js = <<<JS
alert("HELLO!");
JS;

$this->registerJS($js, yii\web\View::POS_LOAD);
?>