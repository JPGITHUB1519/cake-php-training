<?php
// look that shit, 2+ hours wasted looking for the error papush
//namespace App\Controller\V1\Battles;
namespace App\Controller\Api\V1\Battles;

use App\Controller\Api\AppController;

class MoviesController extends AppController
{
    public function initialize()
    {
        parent::initialize();
        $this->loadModel('Battles');
        $this->loadComponent('RequestHandler');
    }

    public function index()
    {
        $battleId = $this->request->getParam('battle_id');
        $movies = $this->Battles->get($battleId, [
            'contain' => ['Movies']
        ]);
        $this->setRestResponse($movies['movies'] ?? []);
    }
}
