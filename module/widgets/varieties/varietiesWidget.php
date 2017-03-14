<?php

namespace app\web\theme\module\widgets\varieties;

use Yii;
use yii\base\Widget;


class VarietiesWidget extends Widget
{
    public $viewFile = 'varieties-widget';

    public function run()
    {
        return $this->render(
            $this->viewFile
        );
    }
}
