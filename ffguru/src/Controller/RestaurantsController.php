<?php
namespace App\Controller;

use App\Controller\AppController;
use Cake\Event\Event;

class RestaurantsController extends AppController
{

    public function beforeFilter(Event $event)
    {
        parent::beforeFilter($event);
        $this->Auth->allow(['find']);
    }

    public function index($id=null)
    {
        if (empty($id)) {
            $this->viewBuilder()->setLayout('empty');
            $this->render('index');
            
        }   
    }

    public function view($id=null) 
    {
        $this->render('view');
    }

    public function test() {
        // $this->viewBuilder()->setLayout('empty');
    }
}

