<?php
namespace App\Controller;
use Cake\Collection\Collection;

class TestController extends AppController
{
    public function initialize() {
        parent::initialize();
        $this->loadModel('Articles');
        $this->loadModel('Users');
        $this->loadComponent('RequestHandler');
    }

    public function index()
    {
        $users = $this->Users->find('all')->contain('Articles');
        // $articles = $this->Articles->find('all')
        //     ->map(function($row) {
        //         $row->title = $row->title . " jp papeleteta";
        //         return $row;
        //     });

        dd($users->toArray());

        // $items = ['a' => 1, 'b' => 2, 'c' => 3];
        // $collection = new Collection($items);

        // $overOne = $collection->map(function($value, $key, $iterator) {
        //     return $value * 2;
        // });

        dd($overOne->toArray());
    }
}
