<?php
namespace App\Model\Table;

use App\Model\Entity\Post;
use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;
use Cake\I18n\Time;
use Cake\Log\Log;
use Cake\ORM\TableRegistry;

class PostTable extends Table
{
    public function initialize(array $config)
    {
        parent::initialize($config);

        $this->table('posts');
        $this->displayField('post_title');
        $this->primaryKey('id');

    }

    public function validationDefault(Validator $validator)
    {
        $validator->notEmpty('post_title', __('Post title is required.'))
                ->minLength('post_title', 3, __('Post title must be at least 3 characters.'));

        $validator->notEmpty('post_slug', __('Post slug is required.'))
                ->minLength('post_slug', 3, __('Post slug must be at least 3 characters.'));

        $validator->add('post_slug', [
            'unique' => [
                'rule' => 'validateUnique',
                'provider' => 'table',
                'message' => 'Post slug has already been taken.'
            ]
        ]);

        return $validator;
    }
}
