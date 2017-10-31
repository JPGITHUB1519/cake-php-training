<?php
namespace App\Controller;

use Cake\Event\Event;

class ApiController extends AppController {
    public function initialize() {
        parent::initialize();
        $this->loadModel('Articles');
        $this->loadComponent('RequestHandler');
    }

    function beforeFilter(Event $event)
    {
        $this->Auth->allow(['add', 'edit', 'delete']);
        parent::beforeFilter($event);
    }

    public function isAuthorized($user)
    {
        // All registered users can add articles
        if ($this->request->getParam('action') === 'add' || $this->request->getParam('action') === 'delete' || $this->request->getParam('action') === 'edit') {
            return true;
        }

        return parent::isAuthorized($user);
    }

    public function index()
    {
        $articles = $this->Articles->find('all');

        $this->set([
            'status' => 'success',
            //'data' => ["articles" => $articles],
            'data' => $articles,
            'message' => null,
            '_serialize' => ['status','message', 'data']
        ]);
    }

    public function view($id)
    {
        $article = $this->Articles->get($id);
        $status = 'success';
        $message = null;

        $this->set([
            'status' => $status,
            'message' => $message,
            'data' => $article,
            '_serialize' => ['status', 'message', 'data']
        ]);
    }

    public function add()
    {
        $article = $this->Articles->newEntity();
        if ($this->request->is('post')) {
            $article = $this->Articles->patchEntity($article, $this->request->getData());
            //$article->user_id = $this->Auth->user('id');
            $article->user_id = 1;
            if ($this->Articles->save($article)) {
                $message = 'Article savedge correctly';
                $status = 'success';
            } else {
                $message = 'Error on saving article';
                $status = 'error';
            }
        }

        $this->set([
            'status' => $status,
            'message' => $message,
            'data' => $article,
            '_serialize' => ['status', 'message', 'data']
        ]);
    }

    public function edit($id = null)
    {
        $article = $this->Articles->get($id);

        if ($this->request->is(['post', 'put'])) {
            $this->Articles->patchEntity($article, $this->request->getData());
            if ($this->Articles->save($article)) {
                $message = "Article with id " . $id . ' has been updated';
                $status = 'success';
            } else {
                $message = "Error updating article with id " . $id;
                $status = 'error';
            }
        }

        $this->set([
            'status' => $status,
            'message' => $message,
            'article' => $article,
            '_serialize' => ['message', 'article']
        ]);
    }

    public function delete($id)
    {
        $this->request->allowMethod(['post', 'delete']);
        $article = $this->Articles->get($id);
        if ($this->Articles->delete($article)) {
            $message = "The article with id " . $id . " has been deleted";
        } else {
            $message = "Error deleting the article" . " with id " . $id;
        }

        $this->set([
            'message' => $message,
            '_serialize' => ['message']
        ]);
    }
}
