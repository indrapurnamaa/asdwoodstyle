<?php

/**
 * @link http://www.yiiframework.com/
 * @copyright Copyright (c) 2008 Yii Software LLC
 * @license http://www.yiiframework.com/license/
 */

namespace app\assets;

use yii\web\AssetBundle;

/**
 * Main application asset bundle.
 *
 * @author Qiang Xue <qiang.xue@gmail.com>
 * @since 2.0
 */
class FlatPickrAsset extends AssetBundle
{
    public $sourcePath = '@app/libs/assets/flatpickr';

    public $css = [
        'flatpickr.min.css',
    ];

    public $js = [
        'flatpickr.min.js',
    ];

    public $depends = [
        AppAsset::class,
    ];
}
