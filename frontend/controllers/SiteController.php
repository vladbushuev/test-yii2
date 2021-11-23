<?php

namespace frontend\controllers;

use common\models\Authors;
use yii\web\Controller;


class SiteController extends Controller
{
    public function actions()
    {
        return [
            'error' => [
                'class' => 'yii\web\ErrorAction',
            ],
        ];
    }

    public function actionIndex()
    {
        $authors = Authors::find()->with('books')->all();

        return $this->render('index', compact('authors'));
    }
}
