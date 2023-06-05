<?php

namespace app\core;

class Router
{
    protected array $routes = [];
    public Request $request;
    public Response $response;

    /**
     * A Router costructor
     * @param Request $request is a Request type
     * @return nothing
     */
    public function __construct($request, Response $response)
    {
        $this->request = $request;
        $this->response = $response;
    }

    /**
     * A funciton of get, set a callback for specified path
     * @param $path is the path that is inputted in the url
     * @param $callback is the callback function
     */
    public function get($path, $callback): void
    {
        $this->routes['get'][$path] = $callback;
    }

    /**
     * A funciton of post, set a callback for specified path
     * @param $path is the path that is inputted in the url
     * @param $callback is the callback function
     */
    public function post($path, $callback): void
    {
        $this->routes['post'][$path] = $callback;
    }

    /**
     * A function to resolve the specified path and callback function
     * return "Not found" if the path didn't resolve to any callback
     * execute the callback function if the path reslove to any callbac
     */
    public function resolve(): string
    {
        $path = $this->request->getPath();
        $method = $this->request->getMethod();
        $callback = $this->routes[$method][$path] ?? false;
        if ($callback === false) {
            $this->response->setStatusCode(404);
            return $this->renderView('_404');
            exit;
        }
        if (is_string($callback)) {
            return $this->renderView($callback);
        }
        if (is_array($callback)) {
            $controller = new $callback[0]();
            Application::$app->controller = $controller;
            $controller->action = $callback[1];
            $callback[0] = Application::$app->controller;
            foreach ($controller->middlewares as $middleware) {
                $middleware->execute();
            }
        } 
        return call_user_func($callback, $this->request, $this->response);
    }

    /** 
     * A function that render the page specified in views/ folder
     * @param $view is the name of the file in the view folder we want to
     * render
     */
    public function renderView($view, $params = []): string
    {
        $layoutContent = $this->layoutContent();
        $viewContent = $this->renderOnlyView($view, $params);
        return str_replace('{{content}}', $viewContent, $layoutContent);
    }

    protected function layoutContent(): string
    {
        $layout = Application::$app->controller->layout;
        ob_start();
        include_once Application::$ROOT_DIR . "/views/layouts/$layout.php";
        return ob_get_clean();
    }

    protected function renderOnlyView($view, $params): string
    {
        foreach($params as $key => $value) {
            $$key = $value;   
        }
        ob_start();
        include_once Application::$ROOT_DIR . "/views/$view.php";
        return ob_get_clean();
    }
}

?>
