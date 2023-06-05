<?php

namespace app\core\form;
use app\core\Model;

class Form 
{
    public static function begin(string $action, string $method, string $class): Form
    {
        echo sprintf('<form action="%s" method="%s" class="%s">', $action, $method, $class);
        return new Form();
    }

    public static function end(): void
    {
        echo '</form>';
    }

    public function field(Model $model, $attribute)
    {
        return new Field($model, $attribute);
    }
}



?>
