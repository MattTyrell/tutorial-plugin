<?php
/**
 * @var \App\View\AppView $this
 * @var \ItemManager\Model\Entity\Item $item
 */
?>
<div class="row">
    <aside class="column">
        <div class="side-nav">
            <h4 class="heading"><?= __('Actions') ?></h4>
            <?= $this->Html->link(__('List Items'), ['action' => 'index'], ['class' => 'side-nav-item']) ?>
        </div>
    </aside>
    <div class="column-responsive column-80">
        <div class="items form content">
            <?= $this->Form->create($item) ?>
            <fieldset>
                <legend><?= __('Add Item') ?></legend>
                    <?= $this->Form->control('item_title'); ?>
                    <?= $this->Form->control('sale_price'); ?>
                    <?= $this->Form->control('is_in_stock'); ?>
                    <?= $this->Form->control('item_description'); ?>
                    <?= $this->Form->control('category_id'); ?>
            </fieldset>
            <?= $this->Form->button(__('Submit')) ?>
            <?= $this->Form->end() ?>
        </div>
    </div>
</div>
