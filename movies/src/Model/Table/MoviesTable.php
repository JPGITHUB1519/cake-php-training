<?php
namespace App\Model\Table;

use Cake\ORM\Table;

class MoviesTable extends Table
{
    public function initialize(array $config)
    {
        $this->belongsToMany('Battles');
    }
}
