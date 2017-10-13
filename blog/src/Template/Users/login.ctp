<div class="user form">
<?= $this->Flash->render() ?>
<?= $this->Form->create() ?>
    <fieldset>
        <legend><?=__('Please enter your username and password') ?></legend>
        <?= $this->Form->control('username') ?>
        <?= $this->Form->control('password') ?>
    </fielset>
<?= $this->Form->button(__('Login')); ?>
<?= $this->Form->end() ?>
</div>