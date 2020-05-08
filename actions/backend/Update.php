<?php

namespace susilolab\systemparams\actions\backend;

use Yii;
use yii2mod\editable\EditableAction;
use susilolab\systemparams\SystemParamsService;

/**
 * Class UpdateAction
 *
 * @package susilolab\systemparams\actions\backend\systemParams
 */
class Update extends EditableAction
{
    /**
     * Init action
     */
    public function init()
    {
        $this->modelClass = Yii::$app->get('systemparams')->modelMap['systemParam']['class'];
        parent::init();
    }

    /**
     * After action runs
     */
    public function afterRun()
    {
        SystemParamsService::flushCache();
    }
}
