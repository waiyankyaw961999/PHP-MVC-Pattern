<?php

namespace app\core;

use app\core\Application;
use app\core\middlewares\BaseMiddleware;


class Controller
{
    public string $layout = "main";
    /**
     * @var
     */
    public string $action = '';
    public array $middlewares = [];

    public function setlayout($layout)
    {
        $this->layout = $layout;
    }
    public function render($view, $params = [])
    {
        return Application::$app->view->render($view, $params);
    }

    public function registerMiddleware(BaseMiddleware $middleware)
    {
        $this->middlewares[] = $middleware;
    }

    public function getMiddlewares(): array
    {
        return $this->middlewares;
    }
}
