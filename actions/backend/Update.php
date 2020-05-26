<?php

namespace susilolab\systemparams\actions\backend;

use Yii;
use yii\web\NotFoundHttpException;
use susilolab\systemparams\SystemParamsService;

/**
 * Class UpdateAction
 *
 * @package susilolab\systemparams\actions\backend\systemParams
 */
class Update extends \yii\base\Action
{
    public $view = '@vendor/susilolab/dynamic-params/views/backend/system-param/update';

    /**
     * Init action
     */
    public function init()
    {
        // $this->modelClass = Yii::$app->get('systemparams')->modelMap['systemParam']['class'];
        parent::init();
    }

    /**
     * Run action
     */
    public function run($id)
    {
        
        $modelClass = Yii::$app->get('systemparams')->modelMap['systemParam']['class'];
        $model = $modelClass::find()->where(['param_key' => $id])->one();
        if ($model == null) {
            throw new NotFoundHttpException('The requested page does not exist.');
        }

        if (Yii::$app->request->isPost) {
            $model->validator = 'string';
            $model->load(Yii::$app->request->post());

            if ($model->save()) {
                return $this->controller->redirect(['admin']);    
            }
        }
        return $this->controller->render($this->view, ['model' => $model]);
    }

    /**
     * After action runs
     */
    public function afterRun()
    {
        SystemParamsService::flushCache();
    }
}
