<?php
return [
    'vendorPath' => dirname(dirname(__DIR__)) . '/vendor',
    'extensions'=>require(__DIR__.'/../../vendor/yiisoft/extensions.php'),
    'modules'=>[
        'social'=>[
            'class'=>'kartik\social\Module',
            'disqus'=>[
                'settings'=>['shortname'=>'DISQUS_SHORTNAME'],
            ],
            'facebook'=>[
                'appId'=>'546878252121671',
                'secret'=>'29d8d24e503cd74f030881dfa78b5dfa'
            ],

        ]
    ],
    'components' => [
        'cache' => [
            'class' => 'yii\caching\FileCache',
        ],
        'assetManager' => [
            'appendTimestamp' => true,
            'linkAssets' => true,
            'bundles' => [
                'yii\web\JqueryAsset' => [
                    //'sourcePath' => null,   // do not publish the bundle
                    'js' => [
                        YII_ENV_DEV ? 'jquery.js' : 'jquery.min.js'
                    //    '//ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js',
                    ]
                ],
            ],
//            'assetMap' => [
//                'jquery.js' => '//ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js',
//            ],
        ],

    ],
];
