<?php
namespace bupy7\flexslider;

use yii\base\Widget;
use yii\helpers\Html;
use yii\helpers\Json;
use yii\web\View;
use yii\web\JsExpression;

/**
 * This is widget wrapper of Flexslider https://github.com/woothemes/FlexSlider
 *
 * GitHub repository JS library: https://github.com/woothemes/FlexSlider
 * GitHub repository this widget: https://github.com/bupy7/yii2-flexslider
 * 
 * @author Vasilij "BuPy7" Belosludcev http://mihaly4.ru
 * @version 1.0
 */
class FlexSlider extends Widget
{
 
    /**
     * @var array Items of FlexSlider.
     * Example:
     * [
     *      '<img src="1.jpg">',
     *      [
     *          'content' => '<div class="wrap">
     *                              <h3>Text</h3>
     *                              <p>Description</p>
     *                        </div>',
     *          'options' => [
     *              'class' => 'second-li',
     *              'style' => 'background: #fff',
     *              'data-thumb' => "image/path.jpg",
     *          ],
     *      ],
     * ]
     */
    public $items;
    
    /**
     * @var array FlexSlider plugin options https://github.com/woothemes/FlexSlider/wiki/FlexSlider-Properties
     */
    public $pluginOptions = [];
    
    /**
     * @var string Slides tag. By default 'ul'.
     */
    public $tagSlides = 'ul';
    
    /**
     * @var string Items tag to slides. By default 'li'.
     */
    public $tagItem = 'li';
    
    /**
     * @var array FlexSlider widget options.
     */
    public $options = [];
    
    /**
     * @var array Options of slides tag.
     */
    public $slidesOptions = [];
    
    public function init()
    {
        parent::init();
        
        FlexSliderAsset::register($this->view);

        $this->options = array_merge(['id' => $this->id], $this->options);

        $this->slidesOptions = array_merge([
            'class' => 'slides',
        ], $this->slidesOptions);
        
        // Encoding expression callback API.
        foreach ([
            'start', 
            'before', 
            'after', 
            'end', 
            'added', 
            'removed',
        ] as $callback) {
            if (isset($this->pluginOptions[$callback]) && !empty($this->pluginOptions[$callback])) {
                $this->pluginOptions[$callback] = new JsExpression($this->pluginOptions[$callback]);
            }
        }

        $options = Json::encode(array_merge([
            'selector' => '.slides > li',
        ], $this->pluginOptions));
        
        $js = <<<JS
$('#{$this->id}').flexslider($options);             
JS;
        $this->view->registerJs($js, View::POS_READY);
    }
    
    public function run()
    {
        echo Html::beginTag('div', $this->options);
        echo Html::beginTag($this->tagSlides, $this->slidesOptions);
        foreach ($this->items as $item) {
            if (is_string($item)) {
                echo Html::tag($this->tagItem, $item);
            }
            if (is_array($item) && !empty($item)) {
                echo Html::tag($this->tagItem, $item['content'], $item['options']);
            }
        }
        echo Html::endTag($this->tagSlides);
        echo Html::endTag('div');
    }

}
