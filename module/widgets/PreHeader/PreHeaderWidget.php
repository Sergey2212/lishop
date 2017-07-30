<?php

namespace app\web\theme\module\widgets\PreHeader;

use app\extensions\DefaultTheme\components\BaseWidget;

class PreHeaderWidget extends BaseWidget
{
    public function widgetRun()
    {
        return $this->render('pre-header-widget');
    }
}