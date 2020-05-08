<?php

namespace susilolab\systemparams\commands;

use Yii;
use yii\console\Controller;
use yii\helpers\Console;
use susilolab\systemparams\SystemParamsService;

/**
 * Class SystemParamCommand
 * System params console command
 *
 * @author Virchenko Maksim <muslim1992@gmail.com>
 *
 * @package susilolab\systemparams\commands
 */
class SystemParamCommand extends Controller
{
    /**
     * Params alias
     *
     * @var string
     */
    public $paramsAlias = '@app/../common/config/systemParams.php';

    /**
     * Run send mail.
     */
    public function actionSync()
    {
        $alias = Yii::getAlias($this->paramsAlias);
        $params = include_once($alias);

        $service = new SystemParamsService();

        if ($service->mergeParams($params, false)) {
            $this->stdout("Sync params done \n", Console::FG_GREEN);
        } else {
            $this->stdout("Sync params done \n", Console::FG_RED);
        }
    }
}
