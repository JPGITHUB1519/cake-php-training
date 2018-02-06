<?php
namespace App\Model\Table;

use Cake\ORM\Table;

class VotesTable extends Table
{
    public function initialize(array $config)
    {
        $this->belongsTo('Battles');
        $this->belongsTo('Movies');
        $this->belongsTo('Users');

    }
}
