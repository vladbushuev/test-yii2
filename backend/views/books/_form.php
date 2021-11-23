<?php

use yii\bootstrap4\Html;
use yii\bootstrap4\ActiveForm;
use kartik\select2\Select2;

/* @var $this yii\web\View */
/* @var $model common\models\Books */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="books-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'title')->textInput(['maxlength' => true]) ?>

    <?=
    $form->field($model, 'author_ids')->widget(Select2::class, [
        'data' => \common\models\Authors::getListForSelect('fio'),
        'maintainOrder' => true,
        'options' => ['placeholder' => 'Выберите автора', 'multiple' => true],
        'pluginOptions' => [
            'tags' => true,
            'tokenSeparators' => [','],
        ],
    ])->label('Авторы');
    ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Добавить' : 'Сохранить', [
            'class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary'
        ]) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
