<?php
/**
 * @var \App\View\AppView $this
 */

$tagCustom = 'Vinicius Ponce';
?>
<!DOCTYPE html>
<html>
<head>
    <?= $this->Html->charset() ?>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>
        <?= $tagCustom ?>:
        <?= $this->fetch('title') ?>
    </title>
    <?= $this->Html->meta('icon') ?>

    <link href="https://fonts.googleapis.com/css?family=Raleway:400,700" rel="stylesheet">

    <?= $this->Html->css(['normalize.min', 'milligram.min', 'cake']) ?>

    <?= $this->fetch('meta') ?>
    <?= $this->fetch('css') ?>
    <?= $this->fetch('script') ?>
</head>
<body>
    <nav class="top-nav">
        <div class="top-nav-title">
            <img src="https://images.tcdn.com.br/static_inst/site/vendedor/tray-cdn/uploads/logo-header.svg">
<!--            <a href="https://images.tcdn.com.br/static_inst/site/vendedor/tray-cdn/uploads/logo-header.svg"></a>-->
        </div>
        <div class="top-nav-links">
            <!-- <a target="_blank" rel="noopener" href="https://book.cakephp.org/4/">Vendas</a> -->
            <!-- <a target="_blank" rel="noopener" href="https://api.cakephp.org/">Vendedores</a> -->
            <?= $this->Html->link(__('Vendas'), ['controller' => 'Sales', 'action' => 'index']) ?>
            <?= $this->Html->link(__('Vendedores'), ['controller' => 'Sellers', 'action' => 'index']) ?>

        </div>
    </nav>
    <main class="main">
        <div class="container">
            <?= $this->Flash->render() ?>
            <?= $this->fetch('content') ?>
        </div>
    </main>
    <footer>
    </footer>
</body>
</html>
