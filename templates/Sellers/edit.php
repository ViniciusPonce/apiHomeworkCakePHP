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
            <?= $this->Form->postLink(
                __('Excluir'),
                ['action' => 'delete', $seller->id],
                ['confirm' => __('Tem certeza que deseja excluir # {0}?', $seller->id), 'class' => 'side-nav-item']
            ) ?>
            <?= $this->Html->link(__('List de Vendedores'), ['action' => 'index'], ['class' => 'side-nav-item']) ?>
        </div>
    </aside>
    <div class="column-responsive column-80">
        <div class="sellers form content">
            <?= $this->Form->create($seller) ?>
            <fieldset>
                <legend><?= __('Editar cadastro') ?></legend>
                <?php
                    echo $this->Form->control('name', ['label' => 'nome']);
                    echo $this->Form->control('email', ['label' => 'email']);
                    // echo $this->Form->control('created_at', ['label' => 'cadastrado em']);
                    // echo $this->Form->control('updated_at', ['label' => 'alterado em']);
                ?>
            </fieldset>
            <?= $this->Form->button(__('Submit')) ?>
            <?= $this->Form->end() ?>
        </div>
    </div>
</div>
