<?php
namespace App\Controller;

class MoviesController extends AppController
{
    public function initialize()
    {
        parent::initialize();
        $this->loadComponent('RequestHandler');
    }

    public function index()
    {
        $this->setRestResponse(["testing" => "jp"]);
    }
}
