<?php

namespace app\core;
use app\core\middlewares\BaseMiddleware;

class Controller 
{
    public string $layout = 'main';
    public array $middlewares = [];
    public string $action = '';

    public function setLayout($layout): void
    {
        $this->layout = $layout;
    }

    public function render($view, $params = [])
    {
        return Application::$app->router->renderView($view, $params);
    }

    public function registerMiddleware(BaseMiddleware $middleware): void
    {
        $this->middlewares[] = $middleware;
    }
}

?>
