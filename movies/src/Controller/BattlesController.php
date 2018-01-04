<?php
namespace App\Controller;

class BattlesController extends AppController
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

    public function view($id)
    {
        $battle = $this->Battles->get($id);
        if (empty($battle)) {
        throw new NotFoundException(__('Article not found'));
    }
        $this->setRestResponse($battle, "fail", "Record not found");
        $this->setRestResponse($battle);

    }
}
