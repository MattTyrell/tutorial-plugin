<?php
/**
 * @var \App\View\AppView $this
 * @var \ItemManager\Model\Entity\Item[] $items
 */
?>
<div class="items index content">
    <?= $this->Html->link(__('New Item'), ['action' => 'add'], ['class' => 'button float-right']); ?>
    <?= $this->Html->link(__('List Categories'),
        [
            'controller' => 'Categories',
            'action' => 'index',
        ],
        [
            'class' => 'button float-right',
        ],
    ); ?>
    <h3><?= __('Items'); ?></h3>
    <div class="table-responsive">
        <table>
            <thead>
                <tr>
                    <th><?= $this->Paginator->sort('id'); ?></th>
                    <th><?= $this->Paginator->sort('item_title'); ?></th>
                    <th><?= $this->Paginator->sort('sale_price'); ?></th>
                    <th><?= $this->Paginator->sort('is_in_stock'); ?></th>
                    <th><?= $this->Paginator->sort('item_description'); ?></th>
                    <th><?= $this->Paginator->sort('category_id'); ?></th>
                    <th class="actions"><?= __('Actions'); ?></th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($items as $item) : ?>
                    <tr>
                        <td><?= $this->Number->format($item->id); ?></td>
                        <td><?= h($item->item_title); ?></td>
                        <td><?= $this->Number->format($item->sale_price); ?></td>
                        <td><?= h($item->is_in_stock); ?></td>
                        <td><?= h($item->item_description); ?></td>
                        <td><?= $this->Number->format($item->category_id); ?></td>
                        <td class="actions">
                            <?= $this->Html->link(__('View'), ['action' => 'view', $item->id]); ?>
                            <?= $this->Html->link(__('Edit'), ['action' => 'edit', $item->id]); ?>
                            <?= $this->Form->postLink(
                                __('Delete'),
                                ['action' => 'delete', $item->id],
                                ['confirm' => __('Are you sure you want to delete # {0}?', $item->id), 'class' => 'side-nav-item']
                            ); ?>
                        </td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>
    <div class="paginator">
        <ul class="pagination">
            <?= $this->Paginator->first('<< ' . __('first')); ?>
            <?= $this->Paginator->prev('< ' . __('previous')); ?>
            <?= $this->Paginator->numbers(); ?>
            <?= $this->Paginator->next(__('next') . ' >'); ?>
            <?= $this->Paginator->last(__('last') . ' >>'); ?>
        </ul>
        <p><?= $this->Paginator->counter(__('Page {{page}} of {{pages}}, showing {{current}} record(s) out of {{count}} total')); ?></p>
    </div>
</div>
