<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Sale $sale
 */
?>
<div class="row">
    <aside class="column">
        <div class="side-nav">
            <h4 class="heading"><?= __('Menu') ?></h4>
            <?= $this->Html->link(__('Lista de Vendas'), ['action' => 'index'], ['class' => 'side-nav-item']) ?>
            <?= $this->Html->link(__('Nova Venda'), ['action' => 'add'], ['class' => 'side-nav-item']) ?>
        </div>
    </aside>
    <div class="column-responsive column-80">
        <div class="sales view content">
            <h3><?= h('#' . $sale->id) ?></h3>
            <table>
                <tr>
                    <th><?= __('Vendedor') ?></th>
                    <td><?= $sale->has('seller') ? $this->Html->link($sale->seller->name, ['controller' => 'Sellers', 'action' => 'view', $sale->seller->id]) : '' ?></td>
                </tr>
                <tr>
                    <th><?= __('Código') ?></th>
                    <td><?= $this->Number->format($sale->seller->id) ?></td>
                </tr>
                <tr>
                    <th><?= __('Valor') ?></th>
                    <td><?= $this->Number->format($sale->value) ?></td>
                </tr>
                <tr>
                    <th><?= __('Comissão') ?></th>
                    <td><?= $this->Number->format($sale->comission) ?></td>
                </tr>
                <tr>
                    <th><?= __('Realizada em') ?></th>
                    <td><?= h($sale->created_at) ?></td>
                </tr>
            </table>
        </div>
    </div>
</div>

