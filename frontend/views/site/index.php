<?php

/* @var $this yii\web\View */

$this->title = 'Главная';
?>
<div class="site-index">
    <div class="row">
        <?php if (empty($authors)): ?>
            <div class="col-sm-12">
                <div class="alert alert-primary" role="alert">
                    Не найдены авторы.
                </div>
            </div>
        <? else : ?>
        <?php foreach ($authors as $author): ?>
            <div class="col-sm-4">
                <div class="card mb-3" style="max-width: 18rem;">
                    <div class="card-header"><b><?= $author->fio ?></b></div>
                    <div class="card-body">
                        <?php if (!$author->books): ?>
                            <p>Нет книг</p>
                        <?php else: ?>
                        <ul>
                            <?php foreach ($author->books as $book): ?>
                            <li><?= $book->title ?></li>
                            <?php endforeach; ?>
                        </ul>
                        <?php endif; ?>
                    </div>
                </div>
            </div>
        <?php endforeach; ?>
        <?php endif; ?>
    </div>
</div>
