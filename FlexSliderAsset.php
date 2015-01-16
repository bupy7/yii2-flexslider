<?php

namespace bupy7\flexslider;

use yii\web\AssetBundle;

/**
 * Assets of FlexSlider.
 */
class FlexSliderAsset extends AssetBundle
{

    public $sourcePath = '@bupy7/flexslider/assets';

    public $css = [
        'flexslider.css',
    ];

    public $js = [
        'jquery.flexslider-min.js',
    ];

    public $depends = [
        'yii\web\YiiAsset',
        'yii\bootstrap\BootstrapAsset',
    ];

}
