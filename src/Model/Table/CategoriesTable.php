<?php
declare(strict_types=1);

namespace ItemManager\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Categories Model
 *
 * @property \ItemManager\Model\Table\ItemsTable&\Cake\ORM\Association\HasMany $Items
 *
 * @method \ItemManager\Model\Entity\Category newEmptyEntity()
 * @method \ItemManager\Model\Entity\Category newEntity(array $data, array $options = [])
 * @method \ItemManager\Model\Entity\Category[] newEntities(array $data, array $options = [])
 * @method \ItemManager\Model\Entity\Category get($primaryKey, $options = [])
 * @method \ItemManager\Model\Entity\Category findOrCreate($search, ?callable $callback = null, $options = [])
 * @method \ItemManager\Model\Entity\Category patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \ItemManager\Model\Entity\Category[] patchEntities(iterable $entities, array $data, array $options = [])
 * @method \ItemManager\Model\Entity\Category|false save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \ItemManager\Model\Entity\Category saveOrFail(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \ItemManager\Model\Entity\Category[]|\Cake\Datasource\ResultSetInterface|false saveMany(iterable $entities, $options = [])
 * @method \ItemManager\Model\Entity\Category[]|\Cake\Datasource\ResultSetInterface saveManyOrFail(iterable $entities, $options = [])
 * @method \ItemManager\Model\Entity\Category[]|\Cake\Datasource\ResultSetInterface|false deleteMany(iterable $entities, $options = [])
 * @method \ItemManager\Model\Entity\Category[]|\Cake\Datasource\ResultSetInterface deleteManyOrFail(iterable $entities, $options = [])
 *
 * @mixin \Cake\ORM\Behavior\TimestampBehavior
 */
class CategoriesTable extends Table
{
    /**
     * Initialize method
     *
     * @param array $config The configuration for the Table.
     * @return void
     */
    public function initialize(array $config): void
    {
        parent::initialize($config);

        $this->setTable('categories');
        $this->setDisplayField('name');
        $this->setPrimaryKey('id');

        $this->addBehavior('Timestamp');

        $this->hasMany('Items', [
            'foreignKey' => 'category_id',
            'className' => 'ItemManager.Items',
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
            ->scalar('name')
            ->maxLength('name', 255)
            ->requirePresence('name', 'create')
            ->notEmptyString('name');

        $validator
            ->dateTime('deleted')
            ->allowEmptyDateTime('deleted');

        return $validator;
    }
}
