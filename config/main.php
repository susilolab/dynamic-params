<?php

use susilolab\systemparams\{
    commands\SystemParamCommand,
    models\SystemParamModel,
    models\SystemParamSearch
};

return [
    'commandMap' => [
        'params' => [
            'class' => SystemParamCommand::class,
            'paramsAlias' => '@app/../common/config/params-system.php',
        ],
    ],
    'modelMap' => [
        'systemParam' => [
            'class' => SystemParamModel::class,
        ],
        'systemParamSearch' => [
            'class' => SystemParamSearch::class,
        ],
    ],
    'cacheDuration' => 28800,
];
