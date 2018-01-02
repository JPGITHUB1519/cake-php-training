<?php
namespace App\Controller;
use Cake\Collection\Collection;

class UsersController extends AppController
{
    public function initialize() {
        parent::initialize();
        $this->loadModel('Articles');
        $this->loadModel('Users');
       // $this->loadComponent('RequestHandler');
    }

    public function index()
    {
        // allow cors from cahephp
        //$this->response->header('Access-Control-Allow-Origin', '*');
        $users = $this->Users->find('all');
        $this->setRestResponse($users);
    }

    public function view($id)
    {
        $user = $this->Users->get($id);
        $this->setRestResponse($user);
    }
}
