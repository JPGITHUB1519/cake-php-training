<?php
namespace App\Model\Table;

use Cake\ORM\Table;

class VotesTable extends Table
{
    public function initialize(array $config)
    {
        $this->belongsToMany('Users');
        $this->belongsToMany('Movies');
        $this->belongsToMany('Movies');
    }
}
