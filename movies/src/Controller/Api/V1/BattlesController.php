<?php
namespace App\Controller\Api\V1;
use App\Controller\Api\AppController;

class BattlesController extends AppController
{
    public function initialize()
    {
        parent::initialize();
        $this->loadModel('Votes');
        $this->loadComponent('RequestHandler');
    }

    const INVALID_PARAMETERS_MESSAGE = " is/are invalids parameters";

    public function index()
    {
        $validFilters = ['date'];
        $battles = $this->Battles->find('all');
        $battles = $this->filterByQueryStrings($battles, $validFilters);
    }

    public function view($id)
    {
        $battle = $this->Battles->get($id);
        $this->setRestResponse($battle);
    }

    public function votes() {
        $votes = $this->Votes->find('all');
        $this->setRestResponse($votes);
    }
}
