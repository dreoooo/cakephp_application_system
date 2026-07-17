<?php

declare(strict_types=1);

namespace App\Model\Table;

use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Requirements Model
 *
 * @property \App\Model\Table\ScholarshipRequirementsTable&\Cake\ORM\Association\HasMany $ScholarshipRequirements
 * @property \App\Model\Table\ScholarshipsTable&\Cake\ORM\Association\BelongsToMany $Scholarships
 *
 * @mixin \Cake\ORM\Behavior\TimestampBehavior
 */
class RequirementsTable extends Table
{
    /**
     * Initialize method
     *
     * @param array<string, mixed> $config The configuration for the Table.
     * @return void
     */
    public function initialize(array $config): void
    {
        parent::initialize($config);

        $this->setTable('requirements');
        $this->setDisplayField('requirement_name');
        $this->setPrimaryKey('id');

        $this->addBehavior('Timestamp');

        $this->hasMany('ScholarshipRequirements', [
            'foreignKey' => 'requirement_id',
            'dependent' => true,
            'cascadeCallbacks' => true,
        ]);

        $this->belongsToMany('Scholarships', [
            'foreignKey' => 'requirement_id',
            'targetForeignKey' => 'scholarship_id',
            'joinTable' => 'scholarship_requirements',
        ]);
    }

    /**
     * Default validation rules.
     *
     * @param \Cake\Validation\Validator $validator Validator instance.
     * @return \Cake\Validation\Validator
     */
    public function validationDefault(Validator $validator): Validator
    {
        $validator
            ->scalar('requirement_name')
            ->maxLength('requirement_name', 150)
            ->requirePresence('requirement_name', 'create')
            ->notEmptyString('requirement_name')
            ->add('requirement_name', 'unique', [
                'rule' => 'validateUnique',
                'provider' => 'table',
            ]);

        $validator
            ->scalar('description')
            ->allowEmptyString('description');

        return $validator;
    }

    /**
     * Returns a rules checker object.
     *
     * @param \Cake\ORM\RulesChecker $rules Rules object.
     * @return \Cake\ORM\RulesChecker
     */
    public function buildRules(RulesChecker $rules): RulesChecker
    {
        $rules->add(
            $rules->isUnique(['requirement_name']),
            ['errorField' => 'requirement_name']
        );

        return $rules;
    }
}
