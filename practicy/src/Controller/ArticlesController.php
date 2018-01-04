<?php
namespace App\Controller;
use Cake\Collection\Collection;

class ArticlesController extends AppController
{
    public function initialize() {
        parent::initialize();
        $this->loadModel('Articles');
        $this->loadModel('Users');
        //$this->loadComponent('RequestHandler');
    }

    public function index()
    {
        $articles = $this->Articles->find('all');
        $user_id = $this->request->getParam('user_id');

        if ($user_id) {
            $articles = $articles->where(['user_id' => $user_id]);
        }

        $this->setRestResponse($articles);
    }


    public function view($id)
    {
        $article = $this->Articles->get($id);
        $user_id = $this->request->getParam('user_id');
         $this->setRestResponse($article);
        // if ($user_id) {
        //     if ($article->user_id == $user_id) {
        //         $this->setRestResponse($article);
        //     } else {
        //         $this->setRestResponse([]);
        //     }
        // }
    }

}
