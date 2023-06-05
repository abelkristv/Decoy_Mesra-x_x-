<?php

namespace app\core;
class Application
{
    public static string $ROOT_DIR;
    public Router $router;
    public Request $request;
    public Response $response;
    public Session $session;
    public Controller $controller;
    public Database $db;
    public ?DbModel $user;
    public static Application $app;

    public function __construct($rootPath, array $config) 
    {
        self::$ROOT_DIR = $rootPath;
        self::$app = $this;
        $this->db = new Database($config['db']);
        $this->request = new Request();
        $this->response = new Response();
        $this->session = new Session();
        $this->router = new Router($this->request, $this->response);
        $this->controller = new Controller();

    }

    public function run(): void
    {
        try {
            echo $this->router->resolve();
        }
        catch(\Exception $e) {
            echo $this->router->renderView('_error');
        }
    }

    public function getController(): Controller
    {
        return $this->controller;
    }

    public function setController(Controller $controller): void
    {
        $this->controller = $controller;
    }

    public function login(DbModel $user, string $userName)
    {
        $this->user = $user;
        $primaryKey = $user->primaryKey();
        $primaryValue = $user->{$primaryKey};
        $this->session->setFlash($userName, $primaryValue);
        var_dump($_SESSION[Session::FLASH_KEY]);
    }
}
?>
