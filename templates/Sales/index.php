<?php

/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Sale[]|\Cake\Collection\CollectionInterface $sales
 */
?>
<div class="sales index content">
    <?= $this->Html->link(__('Nova Venda'), ['action' => 'add'], ['class' => 'button float-right']) ?>
    <h3><?= __('Vendas') ?></h3>
    <div class="table-responsive">
        <table>
            <thead>
                <tr>
                    <th><?= $this->Paginator->sort('id', ['label' => 'Nº']) ?></th>
                    <th><?= $this->Paginator->sort('seller_id', ['label' => 'Vendedor']) ?></th>
                    <th><?= $this->Paginator->sort('value', ['label' => 'Valor']) ?></th>
                    <th><?= $this->Paginator->sort('comission', ['label' => 'Comissão']) ?></th>
                    <th><?= $this->Paginator->sort('created_at', ['label' => 'Data']) ?></th>
                    <th class="actions"></th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($sales as $sale) : ?>
                    <tr>
                        <td><?= $this->Number->format($sale->id, ['precision' => 2]) ?></td>
                        <td><?= $sale->has('seller') ? $this->Html->link($sale->seller->name, ['controller' => 'Sellers', 'action' => 'view', $sale->seller->id]) : '' ?></td>
                        <td><?= $this->Number->format($sale->value) ?></td>
                        <td><?= $this->Number->format($sale->comission) ?></td>
                        <td><?= h($sale->created_at) ?></td>
                        <td class="actions">
                            <?= $this->Html->link(__('Ver'), ['action' => 'view', $sale->id]) ?>
                            <?= $this->Html->link(__('Editar'), ['action' => 'edit', $sale->id]) ?>
                            <?= $this->Form->postLink(__('Excluir'), ['action' => 'delete', $sale->id], ['confirm' => __('Are you sure you want to delete # {0}?', $sale->id)]) ?>
                        </td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>
    <div class="paginator">
        <ul class="pagination">
            <?= $this->Paginator->first('<< ' . __('first')) ?>
            <?= $this->Paginator->prev('< ' . __('anterior')) ?>
            <?= $this->Paginator->numbers() ?>
            <?= $this->Paginator->next(__('proxíma') . ' >') ?>
            <?= $this->Paginator->last(__('last') . ' >>') ?>
        </ul>
        <p><?= $this->Paginator->counter(__('Página {{page}} de {{pages}}, exibindo {{current}} registro(s) de {{count}} total')) ?></p>
    </div>
</div>
