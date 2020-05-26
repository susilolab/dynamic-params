<?php

use yii\grid\GridView;
use yii\helpers\Html;
use yii2mod\editable\EditableColumn;
use yii\bootstrap\ActiveForm;
use yii\helpers\Url;

/* @var $this yii\web\View */
/* @var $searchModel */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = Yii::t('systemparam', 'Manage Params');
$this->params['breadcrumbs'][] = $this->title;
$attributesMap = Yii::$app->get('systemparams')->modelMap['systemParam']['class']::attributesMap();
$validatorList = [
    'string' => 'String',
    'integer' => 'Integer',
    'email' => 'Email',
    'url' => 'URL',
    'boolean' => 'Boolean',
];
?>
<div class="system-param-model-index">
    <h1><?= Html::encode($this->title); ?></h1>

    <?php $form = ActiveForm::begin([
        'enableAjaxValidation' => false,
        'enableClientValidation' => false,
    ]); ?>
        <?= $form->field($model, 'param_key')->textInput(['placeholder' => 'Param Key']) ?>
        <?= $form->field($model, 'validator')->dropDownList($validatorList, ['placeholder' => 'Plih Validator']) ?>
        <?= $form->field($model, 'param_value')->textInput(['placeholder' => 'Param Value']) ?>
        <?= $form->field($model, 'description')->textInput(['placeholder' => 'Description']) ?>

        <div class="my-3">
            <button class="btn btn-primary" type="submit">Simpan</button>
        </div>
    <?php ActiveForm::end(); ?>
</div>
