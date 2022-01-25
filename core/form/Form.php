<?php

namespace app\core\form;

use app\core\Model;
use app\core\form\Field;

class Form
{
    public static function begin($action, $method)
    {
        return sprintf('<form action="%s" method="%s">', $action, $method);
    }
    public static function end()
    {
        return '</form>';
    }
    public function field(Model $model, $attribute)
    {
        return new Field($model, $attribute);
    }
}
