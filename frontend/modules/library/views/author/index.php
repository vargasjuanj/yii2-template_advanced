<?php

use yii\helpers\Html;
use kartik\base\BootstrapInterface;
use kartik\base\BootstrapTrait;
use kartik\base\Config;
use kartik\dialog\Dialog;
use yii\base\InvalidConfigException;
use yii\grid\Column;
use yii\grid\GridView as YiiGridView;
use yii\helpers\ArrayHelper;
use yii\helpers\Inflector;
use yii\helpers\Json;
use yii\helpers\Url;
use yii\web\JsExpression;
use yii\web\Request;
use yii\widgets\Pjax;
use kartik\grid\GridView;
/* @var $this yii\web\View */
/* @var $searchModel frontend\modules\library\models\Author\AuthorSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = Yii::t('app', 'Authors');
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="author-index">
    <?php



    $gridColumns = [

        [

            'class' => 'kartik\grid\SerialColumn',

            'width' => '20px',

        ],



        [

            'class' => 'kartik\grid\ExpandRowColumn',

            'width' => '50px',

            'value' => function ($model, $key, $index, $column) {

                return kartik\grid\GridView::ROW_COLLAPSED;
            },

            'detailUrl' => Url::to(['/library/author/book-detail']),

            'headerOptions' => ['class' => 'kartik-sheet-style']



        ],

        [

            'attribute' => 'name',

            'vAlign' => 'middle',

            'hAlign' => 'center'



        ],

        [

            'class' => 'kartik\grid\ActionColumn',



        ],

    ];



    ?>


    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a(Yii::t('app', 'Create Author'), ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?php // echo $this->render('_search', ['model' => $searchModel]); 
    ?>

    <?= GridView::widget([

        'dataProvider' => $dataProvider,

        'filterModel' => $searchModel,

        'columns' => $gridColumns,

        'responsive' => true,

        'hover' => true,

        'toolbar' => [

            '{export}',

            '{toggleData}'

        ],

        'panel' => [

            'heading' => Yii::t('app', 'Users'),

            'type' => 'info',

            'before' => Html::a(Yii::t('app', 'Create User'), ['create'], ['class' => 'btn btn-danger']),

            'after' => Html::a('<i class="fas fa-redo"></i> Reset Grid', ['index'], ['class' => 'btn btn-info']),

            'footer' => false

        ],

    ]);

    ?>


</div>