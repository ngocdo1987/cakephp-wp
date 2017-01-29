<?php
namespace App\Model\Table;

use App\Model\Entity\Tag;
use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;
use Cake\I18n\Time;
use Cake\Log\Log;
use Cake\ORM\TableRegistry;

class TagTable extends Table
{
    public function initialize(array $config)
    {
        parent::initialize($config);

        $this->table('tags');
        $this->displayField('tag_name');
        $this->primaryKey('id');

    }

    public function validationDefault(Validator $validator)
    {
        $validator->notEmpty('tag_name', __('Tag name is required.'))
                ->minLength('tag_name', 3, __('Tag name must be at least 3 characters.'));

        $validator->notEmpty('tag_slug', __('Tag slug is required.'))
                ->minLength('tag_slug', 3, __('Tag slug must be at least 3 characters.'));

        $validator->add('tag_slug', [
            'unique' => [
                'rule' => 'validateUnique',
                'provider' => 'table',
                'message' => 'Tag slug has already been taken.'
            ]
        ]);

        return $validator;
    }
}
