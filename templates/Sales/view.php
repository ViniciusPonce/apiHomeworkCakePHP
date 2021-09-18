<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Sale $sale
 */
?>
<div class="row">
    <aside class="column">
        <div class="side-nav">
            <h4 class="heading"><?= __('Actions') ?></h4>
            <?= $this->Html->link(__('Edit Sale'), ['action' => 'edit', $sale->id], ['class' => 'side-nav-item']) ?>
            <?= $this->Form->postLink(__('Delete Sale'), ['action' => 'delete', $sale->id], ['confirm' => __('Are you sure you want to delete # {0}?', $sale->id), 'class' => 'side-nav-item']) ?>
            <?= $this->Html->link(__('List Sales'), ['action' => 'index'], ['class' => 'side-nav-item']) ?>
            <?= $this->Html->link(__('New Sale'), ['action' => 'add'], ['class' => 'side-nav-item']) ?>
        </div>
    </aside>
    <div class="column-responsive column-80">
        <div class="sales view content">
            <h3><?= h($sale->id) ?></h3>
            <table>
                <tr>
                    <th><?= __('Seller') ?></th>
                    <td><?= $sale->has('seller') ? $this->Html->link($sale->seller->name, ['controller' => 'Sellers', 'action' => 'view', $sale->seller->id]) : '' ?></td>
                </tr>
                <tr>
                    <th><?= __('Id') ?></th>
                    <td><?= $this->Number->format($sale->id) ?></td>
                </tr>
                <tr>
                    <th><?= __('Value') ?></th>
                    <td><?= $this->Number->format($sale->value) ?></td>
                </tr>
                <tr>
                    <th><?= __('Comission') ?></th>
                    <td><?= $this->Number->format($sale->comission) ?></td>
                </tr>
                <tr>
                    <th><?= __('Created At') ?></th>
                    <td><?= h($sale->created_at) ?></td>
                </tr>
            </table>
        </div>
    </div>
</div>
