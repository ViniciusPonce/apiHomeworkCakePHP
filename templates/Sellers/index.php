<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Seller[]|\Cake\Collection\CollectionInterface $sellers
 */
?>
<div class="sellers index content">
    <?= $this->Html->link(__('Novo vendedor'), ['action' => 'add'], ['class' => 'button float-right']) ?>
    <h3><?= __('Vendedores') ?></h3>
    <div class="table-responsive">
        <table>
            <thead>
                <tr>
                    <th><?= $this->Paginator->sort('id') ?></th>
                    <th><?= $this->Paginator->sort('nome') ?></th>
                    <th><?= $this->Paginator->sort('email') ?></th>
                    <th class="actions"><?= __('Ações') ?></th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($sellers as $seller): ?>
                <tr>
                    <td><?= $this->Number->format($seller->id) ?></td>
                    <td><?= h($seller->name) ?></td>
                    <td><?= h($seller->email) ?></td>
                    <td class="actions">
                        <?= $this->Html->link(__('Ver'), ['action' => 'view', $seller->id]) ?>
                        <?= $this->Html->link(__('Editar'), ['action' => 'edit', $seller->id]) ?>
                        <?= $this->Form->postLink(__('Excluir'), ['action' => 'delete', $seller->id], ['confirm' => __('Você tem certeza que deseja deletar {0}?', $seller->id)]) ?>
                    </td>
                </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>
    <div class="paginator">
        <ul class="pagination">
            <?= $this->Paginator->first('<< ' . __('first')) ?>
            <?= $this->Paginator->prev('< ' . __('Anterior')) ?>
            <?= $this->Paginator->numbers() ?>
            <?= $this->Paginator->next(__('Próxima') . ' >') ?>
            <?= $this->Paginator->last(__('last') . ' >>') ?>
        </ul>
        <p><?= $this->Paginator->counter(__('Página {{page}} de {{pages}}, mostrando {{current}} registro(s) de {{count}} Total')) ?></p>
    </div>
</div>
