<?php

$params = require __DIR__ . '/params.php';
$db     = require __DIR__ . '/db.php';

return [
    'id' => 'basic',
    'basePath' => dirname(__DIR__),

    // Dashboard em HomeController::actionIndex() é a página inicial
    'defaultRoute' => 'home/index',

    // Idioma padrão
    'language' => 'pt-BR',

    'bootstrap' => ['log'],
    'components' => [
        'request' => [
            // Chave gerada por você: NÃO deixe em branco!
            'cookieValidationKey' => 'SUA_CHAVE_AQUI',
        ],
        'cache' => [
            'class' => 'yii\caching\FileCache',
        ],
        'user' => [
            // ATENÇÃO: este model precisa existir em models/User.php
            'identityClass'   => 'app\models\User',
            'enableAutoLogin' => true,
        ],
        'errorHandler' => [
            'errorAction' => 'site/error',
        ],
        'mailer' => [
            'class' => 'yii\swiftmailer\Mailer',
            'useFileTransport' => true,
        ],
        'log' => [
            'traceLevel' => YII_DEBUG ? 3 : 0,
            'targets' => [
                [
                    'class'  => 'yii\log\FileTarget',
                    'levels' => ['error','warning'],
                ],
            ],
        ],
        'db' => $db,

        // URL amigável (sem index.php?r=)
        'urlManager' => [
            'enablePrettyUrl' => true,
            'showScriptName'  => false,
            'rules' => [
                // regras personalizadas, se precisar
            ],
        ],

        // Asset Manager para CDNs (Bootstrap e jQuery)
        'assetManager' => [
            'bundles' => [
                // jQuery via CDN
                'yii\web\JqueryAsset' => [
                    'sourcePath' => null,
                    'js' => [
                        'https://code.jquery.com/jquery-3.6.0.min.js',
                    ],
                ],
                // Bootstrap CSS via CDN
                'yii\bootstrap5\BootstrapAsset' => [
                    'sourcePath' => null,
                    'css' => [
                        'https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css',
                    ],
                ],
                // Bootstrap JS via CDN
                'yii\bootstrap5\BootstrapPluginAsset' => [
                    'sourcePath' => null,
                    'js' => [
                        'https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js',
                    ],
                ],
            ],
        ],
    ],

    'params' => $params,

    // Módulos de desenvolvimento
    'modules' => YII_ENV_DEV ? [
        'debug' => [
            'class' => 'yii\debug\Module',
            // 'allowedIPs' => ['127.0.0.1','::1'],
        ],
        'gii' => [
            'class' => 'yii\gii\Module',
            // 'allowedIPs' => ['127.0.0.1','::1'],
        ],
    ] : [],
];
