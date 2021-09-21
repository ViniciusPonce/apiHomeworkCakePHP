<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Seller $seller
 */
?>
<div class="row">
    <aside class="column">
        <div class="side-nav">
            <h4 class="heading"><?= __('Menu') ?></h4>
            <?= $this->Html->link(__('Editar'), ['action' => 'edit', $seller->id], ['class' => 'side-nav-item']) ?>
            <?= $this->Form->postLink(__('Excluir'), ['action' => 'delete', $seller->id], ['confirm' => __('Tem certeza que deseja excluir # {0}?', $seller->id), 'class' => 'side-nav-item']) ?>
            <?= $this->Html->link(__('Lista de Vendedores'), ['action' => 'index'], ['class' => 'side-nav-item']) ?>
            <?= $this->Html->link(__('Novo vendedor'), ['action' => 'add'], ['class' => 'side-nav-item']) ?>
        </div>
    </aside>
    <div class="column-responsive column-80">
        <div class="sellers view content">
            <h3><?= h($seller->name) ?></h3>
            <table>
                <tr>
                    <th><?= __('Name') ?></th>
                    <td><?= h($seller->name) ?></td>
                </tr>
                <tr>
                    <th><?= __('Email') ?></th>
                    <td><?= h($seller->email) ?></td>
                </tr>
                <tr>
                    <th><?= __('Código') ?></th>
                    <td><?= $this->Number->format($seller->id) ?></td>
                </tr>
                <tr>
                    <th><?= __('Cadastrado em') ?></th>
                    <td><?= h($seller->created_at) ?></td>
                </tr>
                <tr>
                    <th><?= __('Alterado em') ?></th>
                    <td><?= h($seller->updated_at) ?></td>
                </tr>
            </table>
            <div class="related">
                <h4><?= __('Vendas Relacionadas') ?></h4>
                <?php if (!empty($seller->sales)) : ?>
                <div class="table-responsive">
                    <table>
                        <tr>
                            <th><?= __('Nº Venda') ?></th>
                            <th><?= __('Código') ?></th>
                            <th><?= __('Valor') ?></th>
                            <th><?= __('Comissão') ?></th>
                            <th><?= __('Data') ?></th>
                            <th class="actions"><?= __('Ações') ?></th>
                        </tr>
                        <?php foreach ($seller->sales as $sales) : ?>
                        <tr>
                            <td><?= h($sales->id) ?></td>
                            <td><?= h($sales->seller_id) ?></td>
                            <td><?= h($sales->value) ?></td>
                            <td><?= h($sales->comission) ?></td>
                            <td><?= h($sales->created_at) ?></td>
                            <td class="actions">
                                <?= $this->Html->link(__('Ver'), ['controller' => 'Sales', 'action' => 'view', $sales->id]) ?>
                                <?= $this->Html->link(__('Editar'), ['controller' => 'Sales', 'action' => 'edit', $sales->id]) ?>
                                <?= $this->Form->postLink(__('Excluir'), ['controller' => 'Sales', 'action' => 'delete', $sales->id], ['confirm' => __('Are you sure you want to delete # {0}?', $sales->id)]) ?>
                            </td>
                        </tr>
                        <?php endforeach; ?>
                    </table>
                </div>
                <?php endif; ?>
            </div>
        </div>
    </div>
</div>
