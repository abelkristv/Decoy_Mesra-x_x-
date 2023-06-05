<?php


namespace app\controllers;

use app\core\Controller;
use app\core\Request;

class SiteController extends Controller
{
    public function home(): string
    {
        $params = [
            'name' => "TheCodeholic"
        ];
        return $this->render('home', $params);
    }

    public function contact(): string
    {
        return $this->render('contact');
    }

    public function handleContact(Request $request): string
    {
        $body = $request->getBody();
    }

    public function dashboard(): string
    {
        return $this->render('dashboard');
    }

    public function guruPage(): string
    {
        $this->setLayout('none');
        return $this->render('guruPage');
    }

    public function transaksi(): string
    {
        $this->setLayout('none');
        return $this->render('transaksi');
    }

    public function formTransaksi(): string
    { 
        $this->setLayout('none');
        return $this->render('formTransaksi');
    }

    public function grading(): string
    { 
        $this->setLayout('none');
        return $this->render('grading');
    }
}

?>
