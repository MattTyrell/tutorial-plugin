<?php
declare(strict_types=1);

namespace ItemManager\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Items Model
 *
 * @property \ItemManager\Model\Table\CategoriesTable&\Cake\ORM\Association\BelongsTo $Categories
 *
 * @method \ItemManager\Model\Entity\Item newEmptyEntity()
 * @method \ItemManager\Model\Entity\Item newEntity(array $data, array $options = [])
 * @method \ItemManager\Model\Entity\Item[] newEntities(array $data, array $options = [])
 * @method \ItemManager\Model\Entity\Item get($primaryKey, $options = [])
 * @method \ItemManager\Model\Entity\Item findOrCreate($search, ?callable $callback = null, $options = [])
 * @method \ItemManager\Model\Entity\Item patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \ItemManager\Model\Entity\Item[] patchEntities(iterable $entities, array $data, array $options = [])
 * @method \ItemManager\Model\Entity\Item|false save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \ItemManager\Model\Entity\Item saveOrFail(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \ItemManager\Model\Entity\Item[]|\Cake\Datasource\ResultSetInterface|false saveMany(iterable $entities, $options = [])
 * @method \ItemManager\Model\Entity\Item[]|\Cake\Datasource\ResultSetInterface saveManyOrFail(iterable $entities, $options = [])
 * @method \ItemManager\Model\Entity\Item[]|\Cake\Datasource\ResultSetInterface|false deleteMany(iterable $entities, $options = [])
 * @method \ItemManager\Model\Entity\Item[]|\Cake\Datasource\ResultSetInterface deleteManyOrFail(iterable $entities, $options = [])
 *
 * @mixin \Cake\ORM\Behavior\TimestampBehavior
 * @mixin \Muffin\Trash\Model\Behavior\TrashBehavior
 */
class ItemsTable extends Table
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

        $this->setTable('items');
        $this->setDisplayField('item_title');
        $this->setPrimaryKey('id');

        $this->addBehavior('Timestamp');
        $this->addBehavior('Muffin/Trash.Trash');

        $this->belongsTo('Categories', [
            'foreignKey' => 'category_id',
            'joinType' => 'INNER',
            'className' => 'ItemManager.Categories',
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
            ->scalar('item_title')
            ->maxLength('item_title', 255)
            ->requirePresence('item_title', 'create')
            ->notEmptyString('item_title');

        $validator
            ->decimal('sale_price')
            ->requirePresence('sale_price', 'create')
            ->notEmptyString('sale_price');

        $validator
            ->boolean('is_in_stock')
            ->requirePresence('is_in_stock', 'create')
            ->notEmptyString('is_in_stock');

        $validator
            ->scalar('item_description')
            ->maxLength('item_description', 255)
            ->allowEmptyString('item_description');

        $validator
            ->notEmptyString('category_id');

        $validator
            ->dateTime('deleted')
            ->allowEmptyDateTime('deleted');

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
        $rules->add($rules->existsIn('category_id', 'Categories'), ['errorField' => 'category_id']);

        return $rules;
    }
}
