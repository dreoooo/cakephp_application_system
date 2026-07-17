<?php
declare(strict_types=1);

namespace App\Model\Table;

use Cake\ORM\Query\SelectQuery;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * ScholarshipRequirements Model
 *
 * @property \App\Model\Table\ScholarshipsTable&\Cake\ORM\Association\BelongsTo $Scholarships
 * @property \App\Model\Table\RequirementsTable&\Cake\ORM\Association\BelongsTo $Requirements
 *
 * @method \App\Model\Entity\ScholarshipRequirement newEmptyEntity()
 * @method \App\Model\Entity\ScholarshipRequirement newEntity(array $data, array $options = [])
 * @method array<\App\Model\Entity\ScholarshipRequirement> newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\ScholarshipRequirement get(mixed $primaryKey, array|string $finder = 'all', \Psr\SimpleCache\CacheInterface|string|null $cache = null, \Closure|string|null $cacheKey = null, mixed ...$args)
 * @method \App\Model\Entity\ScholarshipRequirement findOrCreate($search, ?callable $callback = null, array $options = [])
 * @method \App\Model\Entity\ScholarshipRequirement patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method array<\App\Model\Entity\ScholarshipRequirement> patchEntities(iterable $entities, array $data, array $options = [])
 * @method \App\Model\Entity\ScholarshipRequirement|false save(\Cake\Datasource\EntityInterface $entity, array $options = [])
 * @method \App\Model\Entity\ScholarshipRequirement saveOrFail(\Cake\Datasource\EntityInterface $entity, array $options = [])
 * @method iterable<\App\Model\Entity\ScholarshipRequirement>|\Cake\Datasource\ResultSetInterface<\App\Model\Entity\ScholarshipRequirement>|false saveMany(iterable $entities, array $options = [])
 * @method iterable<\App\Model\Entity\ScholarshipRequirement>|\Cake\Datasource\ResultSetInterface<\App\Model\Entity\ScholarshipRequirement> saveManyOrFail(iterable $entities, array $options = [])
 * @method iterable<\App\Model\Entity\ScholarshipRequirement>|\Cake\Datasource\ResultSetInterface<\App\Model\Entity\ScholarshipRequirement>|false deleteMany(iterable $entities, array $options = [])
 * @method iterable<\App\Model\Entity\ScholarshipRequirement>|\Cake\Datasource\ResultSetInterface<\App\Model\Entity\ScholarshipRequirement> deleteManyOrFail(iterable $entities, array $options = [])
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
     * Returns a rules checker object that will be used for validating
     * application integrity.
     *
     * @param \Cake\ORM\RulesChecker $rules The rules object to be modified.
     * @return \Cake\ORM\RulesChecker
     */
    public function buildRules(RulesChecker $rules): RulesChecker
    {
        $rules->add($rules->isUnique(['scholarship_id', 'requirement_id']), ['errorField' => 'scholarship_id', 'message' => __('This combination of scholarship_id and requirement_id already exists')]);
        $rules->add($rules->existsIn(['scholarship_id'], 'Scholarships'), ['errorField' => 'scholarship_id']);
        $rules->add($rules->existsIn(['requirement_id'], 'Requirements'), ['errorField' => 'requirement_id']);

        return $rules;
    }
}
