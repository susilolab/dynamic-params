<?php

namespace susilolab\systemparams\actions\backend;

use Yii;
use susilolab\systemparams\models\SystemParamSearch;

/**
 * Creates a new model.
 *
 * @author Orlov Alexey <Orlov.Alexey@zfort.net>
 * If creation is successful, the browser will be redirected to the 'admin' page.
 */
class Create extends \yii\base\Action
{
    /**
     * View
     *
     * @var string
     */
    public $view = '@vendor/susilolab/dynamic-params/views/backend/system-param/create';

    /**
     * Run action
     */
    public function run()
    {
        
        $modelClass = Yii::$app->get('systemparams')->modelMap['systemParam']['class'];
        $model = new $modelClass;
        $model->validator = 'string';
        $model->load(Yii::$app->request->post());

        if ($model->save()) {
            return $this->controller->redirect(['admin']);    
        }
        return $this->controller->render($this->view, ['model' => $model]);
    }
}
