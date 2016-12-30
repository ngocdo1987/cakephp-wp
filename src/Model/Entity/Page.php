<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

class Page extends Entity
{
    protected $_accessible = [
        '*' => true,
        'id' => false,
    ];
}
