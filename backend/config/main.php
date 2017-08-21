<?php
$params = array_merge(
    require(__DIR__ . '/../../common/config/params.php'),
    require(__DIR__ . '/../../common/config/params-local.php'),
    require(__DIR__ . '/params.php'),
    require(__DIR__ . '/params-local.php')
);

return [
    'language'=>'zh-CN',

    "modules" => [
        "admin" => [
            "class" => 'mdm\admin\Module',
        ],
    ],

    "aliases" => [
        "@mdm/admin" => "@vendor/mdmsoft/yii2-admin",
    ],

    'as access' => [
        //ACF肯定要加,加了才会自动验证是否有权限
        'class' => 'mdm\admin\components\AccessControl',
        'allowActions' => [
            //允许访问的action
            //controller/action
            //'*'
            'site/*',
            'index/*',
            'admin/*'
        ]
    ],

    'id' => 'app-backend',
    'basePath' => dirname(__DIR__),
    'controllerNamespace' => 'backend\controllers',
    'bootstrap' => ['log'],
//    'modules' => [],
    'components' => [
        'request' => [
            'csrfParam' => '_csrf-backend',
            'enableCsrfValidation' => false,
        ],
        'user' => [
            'identityClass' => 'common\models\User',
            'enableAutoLogin' => true,
            'identityCookie' => ['name' => '_identity-backend', 'httpOnly' => true],
        ],
        'session' => [
            // this is the name of the session cookie used for login on the backend
            'name' => 'advanced-backend',
        ],
        'log' => [
            'traceLevel' => YII_DEBUG ? 3 : 0,
            'targets' => [
                [
                    'class' => 'yii\log\FileTarget',
                    'levels' => ['error', 'warning'],
                ],
            ],
        ],
        'errorHandler' => [
            'errorAction' => 'site/error',
        ],
        'i18n' => [
            'translations' => [
                'common' => [
                    'class' => 'yii\i18n\PhpMessageSource',
                    //'basePath' => '/messages',
                    'fileMap' => [
                        'common' => 'common.php',
                    ],
                ],
            ],
        ],

        'urlManager' => [
            'enablePrettyUrl' => true,
            'showScriptName' => false,
            'rules' => [
            ],
        ],

        //权限管理方式
        'authManager' => [
            'class' => 'yii\rbac\DbManager', // 使用数据库管理配置文件
            "defaultRoles" => ["guest"],
        ],

        //禁用加载自带的 jquery 和 bootstrap.css 文件[添加此处代码与AppAsset.php 中的public $depends YiiAsset、BootstrapAsset注释掉同效]
//        'assetManager'=>[
//            'bundles'=>[
//                'yii\bootstrap\BootstrapAsset' => [
//                    'css' => []
//                ],
//                'yii\web\JqueryAsset' => [
//                    'sourcePath' => null,
//                    'js' => []
//                ],
//            ],
//
//        ]

        
    ],
    'params' => $params,

    //打开调试工具栏
//    'bootstrap' => ['debug'],
//    'modules' => [
//        'debug' => 'yii\debug\Module',
//    ]
];

