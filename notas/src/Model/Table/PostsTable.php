<?php

namespace App\Model\Table;

use Cake\ORM\Table;
use Cake\Utility\Text;
use Cake\Validation\Validator;

class PostsTable extends Table
{

        public function beforeSave ($event, $entity, $options)
        {
            if ($entity->isNew() && !$entity->slug)
            {
                $slug= Text::slug($entity->title);

                $entity->slug = substr($slug, 0, 192);
            }
        }

        public function ValidationDefault(validator $validator)
        {
            $validator
                ->notEmpty('tile')
                ->minLength('title',10);

            return $validator;
        }


        public function initialize(array $config)
        {

            $this->addBehavior('Timestamp');
        }
}