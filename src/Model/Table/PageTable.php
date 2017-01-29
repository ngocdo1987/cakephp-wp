<?php
namespace App\Model\Table;

use App\Model\Entity\Page;
use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;
use Cake\I18n\Time;
use Cake\Log\Log;
use Cake\ORM\TableRegistry;

class PageTable extends Table
{
    public function initialize(array $config)
    {
        parent::initialize($config);

        $this->table('pages');
        $this->displayField('page_title');
        $this->primaryKey('id');

    }

    public function validationDefault(Validator $validator)
    {
        $validator->notEmpty('page_title', __('Page title is required.'))
                ->minLength('page_title', 3, __('Page title must be at least 3 characters.'));

        $validator->notEmpty('page_slug', __('Page slug is required.'))
                ->minLength('page_slug', 3, __('Page slug must be at least 3 characters.'));

        $validator->add('page_slug', [
            'unique' => [
                'rule' => 'validateUnique',
                'provider' => 'table',
                'message' => __('Page slug has already been taken.')
            ]
        ]);

        return $validator;
    }
}
