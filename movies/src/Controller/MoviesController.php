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
        $movies = $this->Movies->find('all');
        $this->setRestResponse($movies);
    }
}
