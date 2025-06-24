<?php

$params = require __DIR__ . '/params.php';
$db     = require __DIR__ . '/db.php';

return [
    'id' => 'basic',
    'basePath' => dirname(__DIR__),

    // faz o Dashboard em HomeController::actionIndex() ser a página inicial
    'defaultRoute' => 'home/index',

    'language' => 'pt-BR',

    'bootstrap' => ['log'],
    'components' => [
        'request' => [
            // chave gerada por você: NÃO deixe em branco!
            'cookieValidationKey' => 'SUA_CHAVE_AQUI',
        ],
        'cache' => [
            'class' => 'yii\caching\FileCache',
        ],
        'user' => [
            'identityClass'   => 'app\models\User',
            'enableAutoLogin' => true,
        ],
        'errorHandler' => [
            // em caso de erro, ele chama SiteController::actionError()
            'errorAction' => 'site/error',
        ],
        'mailer' => [
            'class' => 'yii\swiftmailer\Mailer',
            // enviar para arquivo em runtime/mails (dev)
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

        // URL “bonita” (remover index.php?r=)
        'urlManager' => [
            'enablePrettyUrl' => true,
            'showScriptName'  => false,
            'rules' => [
                // regras personalizadas, se precisar
            ],
        ],

        // <<<--- aqui começa a configuração de CDNs
        'assetManager' => [
            'bundles' => [
                // carrega jQuery via CDN
                'yii\web\JqueryAsset' => [
                    'sourcePath' => null,
                    'js' => [
                        'https://code.jquery.com/jquery-3.6.0.min.js',
                    ],
                ],
                // carrega CSS do Bootstrap via CDN
                'yii\bootstrap5\BootstrapAsset' => [
                    'sourcePath' => null,
                    'css' => [
                        'https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css',
                    ],
                ],
                // carrega JS do Bootstrap Bundle via CDN
                'yii\bootstrap5\BootstrapPluginAsset' => [
                    'sourcePath' => null,
                    'js' => [
                        'https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js',
                    ],
                ],
            ],
        ],
        // --- fim da configuração de CDNs >>>

    ],

    'params' => $params,

    // módulos de desenvolvimento
    'modules' => YII_ENV_DEV ? [
        'debug' => [
            'class' => 'yii\debug\Module',
            // 'allowedIPs' => ['127.0.0.1','::1'], // liberar IPs adicionais
        ],
        'gii' => [
            'class' => 'yii\gii\Module',
            // 'allowedIPs' => ['127.0.0.1','::1'],
        ],
    ] : [],
];
