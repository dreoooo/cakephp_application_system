<?php
declare(strict_types=1);

namespace App\Model\Table;

use Cake\ORM\Query\SelectQuery;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Requirements Model
 *
 * @property \App\Model\Table\ScholarshipRequirementsTable&\Cake\ORM\Association\HasMany $ScholarshipRequirements
 *
 * @method \App\Model\Entity\Requirement newEmptyEntity()
 * @method \App\Model\Entity\Requirement newEntity(array $data, array $options = [])
 * @method array<\App\Model\Entity\Requirement> newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\Requirement get(mixed $primaryKey, array|string $finder = 'all', \Psr\SimpleCache\CacheInterface|string|null $cache = null, \Closure|string|null $cacheKey = null, mixed ...$args)
 * @method \App\Model\Entity\Requirement findOrCreate($search, ?callable $callback = null, array $options = [])
 * @method \App\Model\Entity\Requirement patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method array<\App\Model\Entity\Requirement> patchEntities(iterable $entities, array $data, array $options = [])
 * @method \App\Model\Entity\Requirement|false save(\Cake\Datasource\EntityInterface $entity, array $options = [])
 * @method \App\Model\Entity\Requirement saveOrFail(\Cake\Datasource\EntityInterface $entity, array $options = [])
 * @method iterable<\App\Model\Entity\Requirement>|\Cake\Datasource\ResultSetInterface<\App\Model\Entity\Requirement>|false saveMany(iterable $entities, array $options = [])
 * @method iterable<\App\Model\Entity\Requirement>|\Cake\Datasource\ResultSetInterface<\App\Model\Entity\Requirement> saveManyOrFail(iterable $entities, array $options = [])
 * @method iterable<\App\Model\Entity\Requirement>|\Cake\Datasource\ResultSetInterface<\App\Model\Entity\Requirement>|false deleteMany(iterable $entities, array $options = [])
 * @method iterable<\App\Model\Entity\Requirement>|\Cake\Datasource\ResultSetInterface<\App\Model\Entity\Requirement> deleteManyOrFail(iterable $entities, array $options = [])
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
            ->add('requirement_name', 'unique', ['rule' => 'validateUnique', 'provider' => 'table']);

        $validator
            ->scalar('description')
            ->allowEmptyString('description');

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
        $rules->add($rules->isUnique(['requirement_name']), ['errorField' => 'requirement_name']);

        return $rules;
    }
}
