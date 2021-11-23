<?php

use yii\bootstrap4\Html;
use yii\grid\GridView;
use yii\widgets\Pjax;

/* @var $this yii\web\View */
/* @var $searchModel backend\models\search\BooksSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Книги';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="books-index">
    <p>
        <?= Html::a('Добавить книгу', ['create'], ['class' => 'btn btn-success btn-lg btn-block']) ?>
    </p>

    <?php Pjax::begin(); ?>
    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'id',
            'title',
            [
                'attribute' => 'authors',
                'label' => 'Авторы',
                'format' => 'text',
                'content' => function($data) {
                    $authors = [];
                    foreach ($data->authors as $author) {
                        $authors[] = $author->fio;
                    }
                    return Html::ul($authors);
                },
                'filter' => \common\models\Authors::dropDown(),
            ],

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
    <?php Pjax::end(); ?>
</div>
