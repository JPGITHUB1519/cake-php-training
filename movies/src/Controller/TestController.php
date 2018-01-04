<?php
namespace App\Controller;

class TestController extends AppController
{
    public function initialize()
    {
        parent::initialize();
        $this->loadComponent('RequestHandler');
    }

    public function index()
    {
        $battles = $this->Battles->find('all');
        $this->setRestResponse($battles);
    }
}
