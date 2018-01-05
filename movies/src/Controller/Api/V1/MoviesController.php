<?php
namespace App\Controller\Api\V1;

use App\Controller\Api\AppController;

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
