<!DOCTYPE html>
<html>
<head>
    <?= $this->Html->charset() ?>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>
        <?= $this->fetch('title') ?>
    </title>
    <?= $this->Html->meta('icon') ?>
    <?= $this->Html->css('vendor/bootstrap.min.css') ?>
    <?= $this->Html->css('main.css') ?>
    <?= $this->fetch('meta') ?>
    <?= $this->fetch('css') ?>
    <?= $this->fetch('script') ?>
    <?= $this->Html->script('vendor/jquery-3.2.1.min') ?>
    <?= $this->Html->script('vendor/jquery.ajax-cross-origin.min') ?>
</head>
<body>
    <div class="container">
        <header class="row">
            <div class="col-12">
                <h1 class="text-center">Header</h1>
            </div>
        </header>
        <?= $this->fetch('content') ?>
        <footer class="row">
            <div class="col-12">
                <h1 class="text-center">Footer</h1>
            </div>
        </footer>
    </div>
</body>
</html>
