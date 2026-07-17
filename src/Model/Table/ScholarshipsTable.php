<?php

declare(strict_types=1);

namespace App\Model\Table;

use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Scholarships Model
 *
 * @property \App\Model\Table\ApplicationsTable&\Cake\ORM\Association\HasMany $Applications
 * @property \App\Model\Table\ScholarshipRequirementsTable&\Cake\ORM\Association\HasMany $ScholarshipRequirements
 * @property \App\Model\Table\RequirementsTable&\Cake\ORM\Association\BelongsToMany $Requirements
 *
 * @mixin \Cake\ORM\Behavior\TimestampBehavior
 */
class ScholarshipsTable extends Table
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

        $this->setTable('scholarships');
        $this->setDisplayField('scholarship_name');
        $this->setPrimaryKey('id');

        $this->addBehavior('Timestamp');

        $this->hasMany('Applications', [
            'foreignKey' => 'scholarship_id',
        ]);

        $this->hasMany('ScholarshipRequirements', [
            'foreignKey' => 'scholarship_id',
            'dependent' => true,
            'cascadeCallbacks' => true,
        ]);

        $this->belongsToMany('Requirements', [
            'foreignKey' => 'scholarship_id',
            'targetForeignKey' => 'requirement_id',
            'joinTable' => 'scholarship_requirements',
            'saveStrategy' => 'replace',
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
            ->scalar('scholarship_name')
            ->maxLength('scholarship_name', 150)
            ->requirePresence('scholarship_name', 'create')
            ->notEmptyString('scholarship_name');

        $validator
            ->scalar('description')
            ->allowEmptyString('description');

        $validator
            ->scalar('status')
            ->maxLength('status', 50)
            ->notEmptyString('status');

        return $validator;
    }
}
