<?php
	$this->assign('title', 'Add user');
?>
<div class="users form">
<?= $this->Form->create($user) ?>
    <fieldset>
        <?= $this->Form->input('username') ?>
        <?= $this->Form->input('password') ?>
        <?= $this->Form->input('role', [
            'options' => ['admin' => 'Admin', 'editor' => 'Editor']
        ]) ?>
   </fieldset>
<?= $this->Form->button(__('Submit')); ?>
<?= $this->Form->end() ?>
</div>