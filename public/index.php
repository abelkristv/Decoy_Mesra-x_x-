<?php


namespace app\public;

use app\core\Application;
use app\controllers\SiteController;
use app\controllers\AuthController;
use Dotenv;


require_once __DIR__ . '/../vendor/autoload.php';

$dotenv = Dotenv\Dotenv::createImmutable(dirname(__DIR__));
$dotenv->load();
$config = [
    'db' => [
        'dsn' => $_ENV['DB_DSN'],
        'user' => $_ENV['DB_USER'],
        'password' => $_ENV['DB_PASSWORD']
    ]
];
$app = new Application(dirname(__DIR__), $config);

$app->router->get('/', [SiteController::class, 'home']);
$app->router->get('/contact', [SiteController::class, 'contact']);
$app->router->get('/dashboard', [SiteController::class, 'dashboard']);
$app->router->get('/guruPage', [SiteController::class, 'guruPage']);
$app->router->get('/transaksi', [SiteController::class, 'transaksi']);
$app->router->get('/formTransaksi', [SiteController::class, 'formTransaksi']);
$app->router->get('/grading', [SiteController::class, 'grading']);
$app->router->get('/saran', [SiteController::class, 'saran']);
$app->router->get('/logout', [SiteController::class, 'formTransaksi']);
$app->router->get('/login', [AuthController::class, 'login']);
$app->router->get('/register', [AuthController::class, 'register']);


$app->router->post('/login', [AuthController::class, 'login']);
$app->router->post('/contact', [SiteController::class, 'handleContact']);
$app->router->post('/register', [AuthController::class, 'register']);


$app->run();

?>
