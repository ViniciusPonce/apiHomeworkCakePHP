<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Sale $sale
 * @var \Cake\Collection\CollectionInterface|string[] $sellers
 */
?>
<div class="row">
    <aside class="column">
        <div class="side-nav">
            <h4 class="heading"><?= __('Menu') ?></h4>
            <?= $this->Html->link(__('Lista de Vendas'), ['action' => 'index'], ['class' => 'side-nav-item']) ?>
        </div>
    </aside>
    <div class="column-responsive column-80">
        <div class="sales form content">
            <?= $this->Form->create($sale) ?>
            <fieldset>
                <legend><?= __('Nova Venda') ?></legend>
                <?php
                    echo $this->Form->control('seller_id', ['options' => $sellers, 'label' => 'Vendedores']);
                    echo $this->Form->control('value', ['label' => 'Valor']);
                    // echo $this->Form->control('comission', ['label' => 'Comissão']);
                ?>
            </fieldset>
            <?= $this->Form->button(__('Concluir')) ?>
            <?= $this->Form->end() ?>
        </div>
    </div>
</div>
