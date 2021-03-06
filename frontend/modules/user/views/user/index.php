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
//use yii\grid\GridView;
/* @var $this yii\web\View */
/* @var $searchModel frontend\modules\user\models\User\UserSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = Yii::t('app', 'Users');
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="user-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a(Yii::t('app', 'Create User'), ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <?php

$gridColumns = [

  [

      'class'=>'kartik\grid\SerialColumn',

      'contentOptions'=>['class'=>'kartik-sheet-style'],

      'width'=>'36px',

      'header'=>'',

      'headerOptions'=>['class'=>'kartik-sheet-style']

  ],

  [

      'attribute' => 'username', 

      'vAlign' => 'middle',

      'hAlign' => 'center'

     

  ],

  [

      'attribute' => 'email', 

      'vAlign' => 'middle',

      'hAlign' => 'center'

     

  ],

  [

      'attribute' => 'status', 

      'vAlign' => 'middle',

      'hAlign' => 'center'

     

  ],

  [

      'class' => 'kartik\grid\ActionColumn',

    

  ],

];



?>


<?= GridView::widget([

'dataProvider'=> $dataProvider,

'filterModel' => $searchModel,

'columns' => $gridColumns,

'responsive'=>true,

'hover'=>true,

'toolbar'=>[

    '{export}',

    '{toggleData}'

],

'panel' => [

    'heading'=>Yii::t('app', 'Users'),

    'type'=>'info',

    'before'=>Html::a(Yii::t('app', 'Create User'), ['create'], ['class' => 'btn btn-danger']),

    'after'=>Html::a('<i class="fas fa-redo"></i> Reset Grid', ['index'], ['class' => 'btn btn-info']),

    'footer'=>false

],

]);

?>

</div>
