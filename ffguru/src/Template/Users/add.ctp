<div class="row">
    <div class="col-12">
        <h1 class="text-center">Sign Up!</h1>
        <?= $this->Form->create($user) ?>
            <fieldset>
                <div class="form-group">
                    <?= $this->Form->control('username', ['class' => 'form-control']) ?>
                </div>
                <div class="form-group">
                    <?= $this->Form->control('password', ['class' => 'form-control']) ?>
                </div>
                <div class="form-group">
                    <?= $this->Form->control('role', [
                        'class' => 'form-control',
                        'options' => ['admin' => 'Admin', 'author' => 'Author'],
                    ]) ?> 
                </div>
                <div class="form-group">
                    <?= $this->Form->control('image', ['class' => 'form-control']) ?>
                </div>
                <div class="form-group">
                    <?= $this->Form->control('location', ['class' => 'form-control']) ?>
                </div>
           </fieldset>
        <?= $this->Form->button(__('Submit'), ['class' => 'btn btn default']); ?>
        <?= $this->Form->end() ?>
    </div>
</div>