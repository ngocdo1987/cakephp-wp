<?php
namespace App\Model\Table;

use App\Model\Entity\Category;
use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;
use Cake\I18n\Time;
use Cake\Log\Log;
use Cake\ORM\TableRegistry;

class CategoryTable extends Table
{
    public function initialize(array $config)
    {
        parent::initialize($config);

        $this->table('categories');
        $this->displayField('category_name');
        $this->primaryKey('id');

        $this->belongsToMany('Post', [
            'joinTable' => 'categories_posts',
            'foreignKey' => 'category_id',
            'targetForeignKey' => 'post_id'
        ]);
    }

    public function validationDefault(Validator $validator)
    {
        $validator->notEmpty('category_name', __('Category name is required.'))
                ->minLength('category_name', 3, __('Category name must be at least 3 characters.'));

        $validator->notEmpty('category_slug', __('Category slug is required.'))
                ->minLength('category_slug', 3, __('Category slug must be at least 3 characters.'));

        $validator->add('category_slug', [
            'unique' => [
                'rule' => 'validateUnique',
                'provider' => 'table',
                'message' => __('Category slug has already been taken.')
            ]
        ]);

        return $validator;
    }
}
