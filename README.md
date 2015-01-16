yii2-flexslider
================================================================================

This is widget wrapper of Flexslider https://github.com/woothemes/FlexSlider for Yii2. 

##Installation
The preferred way to install this extension is through [composer](http://getcomposer.org/download/).

Either run
```
$ php composer.phar require bupy7/yii2-flexslider "dev-master"
```

or add
```
"bupy7/yii2-flexslider": "dev-master"
```

to the **require** section of your **composer.json** file.

##How use

Added following code to your view:

```php
...

use bupy7\flexslider\FlexSlider;

echo FlexSlider::widget([
    'items' => [
        '<img src="http://placehold.it/900x400&text=323">',
        [
            'content' => '<img src="http://placehold.it/900x400&text=001">',
            'options' => [
                'class' => 'my-class',
            ],
        ],
    ],
]); 

...
```

##Options of widget

| **Name**       | **Description**                                                                              |
|----------------|----------------------------------------------------------------------------------------------|
| $items         | Items of FlexSlider                                                                          |
| $pluginOptions | FlexSlider plugin options https://github.com/woothemes/FlexSlider/wiki/FlexSlider-Properties |
| $tagSlides     | Slides tag. By default 'ul'.                                                                 |
| $tagItem       | Items tag to slides. By default 'li'.                                                        |
| $options       | FlexSlider widget options.                                                                   |
| $slidesOptions | Options of slides tag.                                                                       |

##License

yii2-flexslider is released under the BSD 3-Clause License.
