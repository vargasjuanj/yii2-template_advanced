<?php

use yii\helpers\Html;
use kartik\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel frontend\modules\library\models\AuthorBook\AuthorBookSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = Yii::t('app', 'Author Books');
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="author-book-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a(Yii::t('app', 'Create Author Book'), ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?php // echo $this->render('_search', ['model' => $searchModel]); 
    ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'kartik\grid\SerialColumn'],
//comentar para ver simple
            [
                'attribute' => 'authorName',
                'label' =>  Yii::t('app', 'Author'),
                'value' => 'author.name',
                'group' => true,
            ],
            [
                'attribute' => 'bookName',
                'value' => 'book.name',
                'label' =>  Yii::t('app', 'Book'),
            ],
            [
                'attribute' => 'author_id',
                'value' => 'author.name',
                'group' => true,  // enable grouping,
                'groupedRow' => true,                    // move grouped column to a single grouped row
                'groupOddCssClass' => 'kv-grouped-row',  // configure odd group cell css class
                'groupEvenCssClass' => 'kv-grouped-row', // configure even group cell css class
            ],
            //'book_id',

            ['class' => 'kartik\grid\ActionColumn'],
        ],
        'pjax' => true,
        'responsive' => true,

        'hover' => true,

        'toolbar' => [

            '{export}',

            '{toggleData}'

        ],
    ]); ?>


</div>