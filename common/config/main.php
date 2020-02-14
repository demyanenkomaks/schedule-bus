<?php
require_once(__DIR__.'/functions.php');
return [
    'name' => 'ЛУГАНСКИЙ АВТОДОР',
    'language' => 'ru-RU',
    'aliases' => [
        '@bower' => '@vendor/bower-asset',
        '@npm'   => '@vendor/npm-asset',
    ],
    'vendorPath' => dirname(dirname(__DIR__)) . '/vendor',
    'components' => [
        'formatter' => [
            'locale' => 'ru-RU',
            'timeZone' => 'Europe/Moscow',
            'defaultTimeZone' => 'Europe/Moscow',
            'dateFormat' => 'dd.MM.yyyy',
            'decimalSeparator' => ',',
            'datetimeFormat' => 'dd.MM.yyyy H:i',
            'timeFormat' => 'H:i',
            'currencyCode' => '',
        ],
        'cache' => [
            'class' => 'yii\caching\FileCache',
        ],
        'authManager' => [
            'class' => 'yii\rbac\DbManager',
        ],
//        'user' => [
//            'identityClass' => 'mdm\admin\models\User',
//            'loginUrl' => ['site/login'],
//        ]
    ],
    'modules' => [
        'jodit' => [
            'class' => 'yii2jodit\JoditModule',
            'extensions' => ['jpg','png','gif'],
            'root'=> '@frontend/web/uploads/',
            'baseurl'=> '/uploads/',
            'maxFileSize'=> '20mb',
            'defaultPermission'=> 0775,
        ],
    ],

];
