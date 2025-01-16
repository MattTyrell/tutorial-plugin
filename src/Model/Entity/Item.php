<?php
declare(strict_types=1);

namespace ItemManager\Model\Entity;

use Cake\ORM\Entity;

/**
 * Item Entity
 *
 * @property int $id
 * @property string $item_title
 * @property string $sale_price
 * @property bool $is_in_stock
 * @property string|null $item_description
 * @property int $category_id
 * @property \Cake\I18n\FrozenTime|null $deleted
 * @property \Cake\I18n\FrozenTime $created
 * @property \Cake\I18n\FrozenTime $modified
 *
 * @property \ItemManager\Model\Entity\Category $category
 */
class Item extends Entity
{
    /**
     * Fields that can be mass assigned using newEntity() or patchEntity().
     *
     * Note that when '*' is set to true, this allows all unspecified fields to
     * be mass assigned. For security purposes, it is advised to set '*' to false
     * (or remove it), and explicitly make individual fields accessible as needed.
     *
     * @var array<string, bool>
     */
    protected $_accessible = [
        'item_title' => true,
        'sale_price' => true,
        'is_in_stock' => true,
        'item_description' => true,
        'category_id' => true,
        'deleted' => true,
        'created' => true,
        'modified' => true,
        'category' => true,
    ];
}
