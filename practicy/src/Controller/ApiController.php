<?php
namespace App\Controller;
use Cake\Collection\Collection;

class ApiController extends AppController
{
    public function initialize() {
        parent::initialize();
        $this->loadModel('Articles');
        $this->loadModel('Users');
        $this->loadComponent('RequestHandler');
    }

    public function rest()
    {
        // allow cors from cahephp
        $this->response->header('Access-Control-Allow-Origin', '*');
        // allow controls headers here
        $users = $this->Users->find('all')->contain('Articles');

        $this->set([
            'users' => $users,
            '_serialize' => ['users']
        ]);
    }
}
