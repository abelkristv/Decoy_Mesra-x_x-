<?php

namespace app\controllers;
use app\core\Controller;
use app\core\Request;
use app\core\Response;
use app\core\Application;
use app\core\Session;
use app\core\middlewares\AuthMiddleware;
use app\models\User;
use app\models\LoginModel;

class AuthController extends Controller
{
    public function __construct()
    {
        $this->registerMiddleware(new AuthMiddleware(['profile']));
    }

    public function login(Request $request, Response $response): string
    {
        $errors = [];
        $loginModel = new LoginModel();
        if ($request->getMethod() == 'post') {
            $loginModel->loadData($request->getBody());
            if ($loginModel->validate() && $loginModel->login()) {
                if (isset($_SESSION[Session::FLASH_KEY]['siswa'])) {
                    $response->redirect('/dashboard');
                }
                else if (isset($_SESSION[Session::FLASH_KEY]['guru'])) {
                    $response->redirect('/guruPage');
                }
                return '';
            }
            $this->setLayout('auth');
            return $this->render('login', [
                'model' => $loginModel
            ]);
        }
        $this->setLayout('auth');
        return $this->render('login', [
            'model' => $loginModel
        ]);
    }

    public function register(Request $request): string
    {
        $errors = [];
        $user = new User();
        if ($request->getMethod() == 'post') {
            $firstname = $request->getBody()['firstname'];
            $user->loadData($request->getBody());
            if ($user->validate() && $user->save()) {
                Application::$app->session->setFlash('success', 'Thanks for registering');
                Application::$app->response->redirect('/');
                exit;
            }
            return $this->render('register', [
                'model' => $user
            ]);
        }
        $this->setLayout('auth');
        return $this->render('register', [
            'model' => $user
        ]);
    }
}

?>
