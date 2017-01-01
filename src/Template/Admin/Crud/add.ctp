<?php
	$this->assign('title', 'Add '.$singular);
?>

<?= $this->element('admin/_form', [
	'config' => $config,
	'crud' => $crud
]) ?>