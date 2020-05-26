<?php

use yii\grid\GridView;
use yii\helpers\Html;
use yii\helpers\Url;
use yii2mod\editable\EditableColumn;

/* @var $this yii\web\View */
/* @var $searchModel */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = Yii::t('systemparam', 'Manage Params');
$this->params['breadcrumbs'][] = $this->title;
$attributesMap = Yii::$app->get('systemparams')->modelMap['systemParam']['class']::attributesMap();
?>
<div class="system-param-model-index">
    <h1><?= Html::encode($this->title); ?></h1>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            $attributesMap['fieldParamKey'],
            $attributesMap['fieldParamValue'],
            $attributesMap['fieldDescription'],
            [
                'class' => 'yii\grid\ActionColumn',
                'header' => Yii::t('app', 'Options'),
                'buttons' => [
                    'update' => function($url, $model, $key) {
                        return Html::a('Update', Url::to(['/params/update', 'id' => $model->param_key]));
                    }
                ],
            ],
        ],
    ]); ?>
</div>
