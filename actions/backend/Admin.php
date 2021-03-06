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
class Admin extends \yii\base\Action
{
    /**
     * View
     *
     * @var string
     */
    public $view = '@vendor/susilolab/dynamic-params/views/backend/system-param/admin';

    /**
     * Run action
     */
    public function run()
    {
        $modelSystemParam = Yii::$app->get('systemparams')->modelMap['systemParamSearch']['class'];
        /** @var SystemParamSearch $searchModel */
        $searchModel = new $modelSystemParam();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->controller->render($this->view, [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }
}
