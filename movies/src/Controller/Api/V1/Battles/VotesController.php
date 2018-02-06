<?php
namespace App\Controller\Api\V1\Battles;

use App\Controller\Api\AppController;

class VotesController extends AppController
{
    public function initialize()
    {
        parent::initialize();
        $this->loadModel('Battles');
        $this->loadModel('Users');
        $this->loadComponent('RequestHandler');
    }

    public function index()
    {
       $users = $this->Users->find('all')->all();
       dd($users);
    }
}
