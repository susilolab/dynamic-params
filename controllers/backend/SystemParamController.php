<?php

namespace susilolab\systemparams\controllers\backend;

use yii\web\Controller;
use susilolab\systemparams\actions\backend\{
    Admin,
    Update
};

/**
 * Class ParamController
 * System param controller
 *
 * @author Virchenko Maksim <muslim1992@gmail.com>
 *
 * @package susilolab\systemparams\controllers\backend
 */
class SystemParamController extends Controller
{
    /**
     * Default action
     *
     * @var string
     */
    public $defaultAction = 'admin';

    /**
     * Declares class-based actions.
     */
    public function actions()
    {
        return [
            'admin' => [
                'class' => Admin::class,
            ],
            'update' => [
                'class' => Update::class,
            ],
        ];
    }
}
