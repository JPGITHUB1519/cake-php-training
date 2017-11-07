<div class="row">
	<div class="col-12">
		<?= $this->Flash->render() ?>
		<?= $this->Form->create() ?>
			<h1 class="text-center">Login</h1>
		    <fieldset>
		        <div class="form-group">
		        	<?= $this->Form->control('username', ['class' => 'form-control']) ?>
		        </div>
		        <div class="form-group">
		        	<?= $this->Form->control('password', ['class' => 'form-control']) ?>
		        </div>
		    </fieldset>
		<?= $this->Form->button(__('Login'), ['class' => 'btn btn-default']); ?>
		<?= $this->Form->end() ?>
	</div>
</div>