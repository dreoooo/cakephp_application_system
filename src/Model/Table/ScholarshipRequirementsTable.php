<?php

declare(strict_types=1);

namespace App\Model\Table;

use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * ScholarshipRequirements Model
 *
 * @property \App\Model\Table\ScholarshipsTable&\Cake\ORM\Association\BelongsTo $Scholarships
 * @property \App\Model\Table\RequirementsTable&\Cake\ORM\Association\BelongsTo $Requirements
 *
 * @mixin \Cake\ORM\Behavior\TimestampBehavior
 */
class ScholarshipRequirementsTable extends Table
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

        $this->setTable('scholarship_requirements');
        $this->setDisplayField('id');
        $this->setPrimaryKey('id');

        $this->addBehavior('Timestamp');

        $this->belongsTo('Scholarships', [
            'foreignKey' => 'scholarship_id',
            'joinType' => 'INNER',
        ]);

        $this->belongsTo('Requirements', [
            'foreignKey' => 'requirement_id',
            'joinType' => 'INNER',
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
            ->integer('scholarship_id')
            ->notEmptyString('scholarship_id');

        $validator
            ->integer('requirement_id')
            ->notEmptyString('requirement_id');

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
            $rules->isUnique(
                ['scholarship_id', 'requirement_id']
            ),
            [
                'errorField' => 'scholarship_id',
                'message' => __('This requirement is already assigned to this scholarship.'),
            ]
        );

        $rules->add(
            $rules->existsIn(['scholarship_id'], 'Scholarships'),
            ['errorField' => 'scholarship_id']
        );

        $rules->add(
            $rules->existsIn(['requirement_id'], 'Requirements'),
            ['errorField' => 'requirement_id']
        );

        return $rules;
    }
}
