<?php

namespace app\libs\widgets;

use Yii;
use yii\base\InvalidConfigException;
use yii\helpers\Html;

class ActionButtons extends \yii\base\Widget
{
    public $dropdownId;
    public $dropdownButtonText;
    public $dropdownItems;

    public function init()
    {
        parent::init();
        $this->dropdownId = $this->dropdownId == null ? 'dropdown-' . Yii::$app->security->generateRandomString(10) : $this->dropdownId;
        $this->dropdownButtonText = $this->dropdownButtonText == null ? '<i class="bi bi-three-dots"></i>' : $this->dropdownButtonText;

        if (!is_array($this->dropdownItems)) {
            throw new InvalidConfigException("Invalid dropdownItems configuration");
        }
    }

    public function run()
    {
        $dropdownButton = Html::tag('button', $this->dropdownButtonText, [
            'class' => 'transparent-btn',
            'type' => 'button',
            'id' => $this->dropdownId,
            'data-bs-toggle' => 'dropdown',
            'data-bs-boundary' => 'viewport',
            'aria-expanded' => 'false',
        ]);

        $dropdownItems = '';

        foreach ($this->dropdownItems as $item) {
            if ($item != '') {
                $options = array_merge([
                    'class' => 'dropdown-item dropdown-item-action',
                    'href' => $item['url'],
                ], isset($item['options']) ? $item['options'] : []);

                $dropdownItems .= Html::tag('a', $item['text'], $options);
            }
        }

        $dropdownItemContainer = Html::tag('div', $dropdownItems, [
            'class' => 'dropdown-menu dropdown-menu-end my-2',
            'aria-labelledby' => $this->dropdownId,
        ]);

        $container = Html::tag(
            'div',
            $dropdownButton . $dropdownItemContainer,
            ['class' => 'dropdown']
        );

        return $container;
    }
}
