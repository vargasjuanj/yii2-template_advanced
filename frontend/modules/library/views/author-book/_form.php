<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use kartik\select2\Select2;
use yii\helpers\ArrayHelper;
use frontend\modules\library\models\Author\Author;
use frontend\modules\library\models\Book\Book;
/* @var $this yii\web\View */
/* @var $model frontend\modules\library\models\AuthorBook\AuthorBook */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="author-book-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'author_id')->widget(Select2::classname(), [

        'data' => ArrayHelper::map(Author::find()->all(), 'id', 'name'),

        'theme' => Select2::THEME_BOOTSTRAP,

        'size' => Select2::LARGE,

        'options' => ['placeholder' => Yii::t('app', 'Select...')],

        'pluginOptions' => [

            'allowClear' => true

        ],

    ]);

    ?>



    <?= $form->field($model, 'book_id')->widget(Select2::classname(), [

        'data' => ArrayHelper::map(Book::find()->all(), 'id', 'name'),

        'theme' => Select2::THEME_BOOTSTRAP,

        'size' => Select2::LARGE,

        'options' => ['placeholder' => Yii::t('app', 'Select...')],

        'pluginOptions' => [

            'allowClear' => true

        ],

    ]);

    ?>



    <div class="form-group">
        <?= Html::submitButton(Yii::t('app', 'Save'), ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>