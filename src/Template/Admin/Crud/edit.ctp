<?php
	$this->assign('title', 'Edit '.$singular);
?>

<?= $this->element('admin/_form', [
	'config' => $config,
	'crud' => $crud
]) ?>