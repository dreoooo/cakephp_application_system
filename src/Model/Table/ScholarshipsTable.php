<?php
declare(strict_types=1);

namespace App\Model\Table;

use Cake\ORM\Query\SelectQuery;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Scholarships Model
 *
 * @property \App\Model\Table\ApplicationsTable&\Cake\ORM\Association\HasMany $Applications
 * @property \App\Model\Table\ScholarshipRequirementsTable&\Cake\ORM\Association\HasMany $ScholarshipRequirements
 *
 * @method \App\Model\Entity\Scholarship newEmptyEntity()
 * @method \App\Model\Entity\Scholarship newEntity(array $data, array $options = [])
 * @method array<\App\Model\Entity\Scholarship> newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\Scholarship get(mixed $primaryKey, array|string $finder = 'all', \Psr\SimpleCache\CacheInterface|string|null $cache = null, \Closure|string|null $cacheKey = null, mixed ...$args)
 * @method \App\Model\Entity\Scholarship findOrCreate($search, ?callable $callback = null, array $options = [])
 * @method \App\Model\Entity\Scholarship patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method array<\App\Model\Entity\Scholarship> patchEntities(iterable $entities, array $data, array $options = [])
 * @method \App\Model\Entity\Scholarship|false save(\Cake\Datasource\EntityInterface $entity, array $options = [])
 * @method \App\Model\Entity\Scholarship saveOrFail(\Cake\Datasource\EntityInterface $entity, array $options = [])
 * @method iterable<\App\Model\Entity\Scholarship>|\Cake\Datasource\ResultSetInterface<\App\Model\Entity\Scholarship>|false saveMany(iterable $entities, array $options = [])
 * @method iterable<\App\Model\Entity\Scholarship>|\Cake\Datasource\ResultSetInterface<\App\Model\Entity\Scholarship> saveManyOrFail(iterable $entities, array $options = [])
 * @method iterable<\App\Model\Entity\Scholarship>|\Cake\Datasource\ResultSetInterface<\App\Model\Entity\Scholarship>|false deleteMany(iterable $entities, array $options = [])
 * @method iterable<\App\Model\Entity\Scholarship>|\Cake\Datasource\ResultSetInterface<\App\Model\Entity\Scholarship> deleteManyOrFail(iterable $entities, array $options = [])
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
