<?php
/**
 * @var \App\View\AppView $this
 * @var \ItemManager\Model\Entity\Item $item
 */
?>
<div class="row">
    <aside class="column">
        <div class="side-nav">
            <h4 class="heading"><?= __('Actions'); ?></h4>
            <?= $this->Html->link(__('Edit Item'), ['action' => 'edit', $item->id], ['class' => 'side-nav-item']); ?>
            <?= $this->Form->postLink(
                __('Delete'),
                ['action' => 'delete', $item->id],
                ['confirm' => __('Are you sure you want to delete # {0}?', $item->id), 'class' => 'side-nav-item']
            ); ?>
            <?= $this->Html->link(__('List Items'), ['action' => 'index'], ['class' => 'side-nav-item']); ?>
            <?= $this->Html->link(__('New Item'), ['action' => 'add'], ['class' => 'side-nav-item']); ?>
        </div>
    </aside>
    <div class="column-responsive column-80">
        <div class="items view content">
            <h3><?= h($item->item_title); ?></h3>
            <table>
                <tr>
                    <th><?= __('ID'); ?></th>
                    <td><?= $this->Number->format($item->id); ?></td>
                </tr>
                <tr>
                    <th><?= __('Item Title'); ?></th>
                    <td><?= h($item->item_title); ?></td>
                </tr>
                <tr>
                    <th><?= __('Sale Price'); ?></th>
                    <td><?= $this->Number->format($item->sale_price); ?></td>
                </tr>
                <tr>
                    <th><?= __('Is In Stock'); ?></th>
                    <td><?= $item->is_in_stock ? __('Yes') : __('No'); ?></td>
                </tr>
                <tr>
                    <th><?= __('Item Description'); ?></th>
                    <td><?= h($item->item_description); ?></td>
                </tr>
                <tr>
                    <th><?= __('Category Id'); ?></th>
                    <td><?= $this->Number->format($item->category_id); ?></td>
                </tr>
                <tr>
                    <th><?= __('Created'); ?></th>
                    <td><?= h($item->created); ?></td>
                </tr>
                <tr>
                    <th><?= __('Modified'); ?></th>
                    <td><?= h($item->modified); ?></td>
                </tr>
            </table>
        </div>
    </div>
</div>
