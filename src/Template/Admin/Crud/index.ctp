<?php
	$this->assign('title', 'List '.$plural);
?>

<p>
    <?= $this->Html->link('ADD NEW', ['action' => 'add'], ['class' => 'btn btn-primary']) ?> 
</p>

<?php if(count($cruds) > 0 && !empty($config)) : ?>
	<table width="100%" class="table table-striped table-bordered table-hover" id="dataTables-example">
        <thead>
            <tr>
            	<?php foreach($config->display->index as $cdi) : ?>
            	<th><?= $config->cols->$cdi->label ?></th>
            	<?php endforeach; ?>
                <th></th>
            </tr>
        </thead>
        <tbody>
        	<?php foreach($cruds as $crud) : ?>
            <tr class="odd">
            	<?php foreach($config->display->index as $cdi) : ?>
            	<td>
	                <?= strip_tags($crud->$cdi) ?>
	        	</td>
            	<?php endforeach; ?>
                <td class="center">
                	<?= $this->Html->link('Edit', ['action' => 'edit', $crud->id], ['class' => 'btn btn-primary btn-xs']) ?> 
                	<?= $this->Form->postLink('Delete', ['action' => 'delete', $crud->id], ['class' => 'btn btn-danger btn-xs', 'confirm' => 'Do you want to delete this '.$singular.'?']) ?>
                </td>
            </tr>
            <?php endforeach; ?>
        </tbody>
    </table>

    <?php echo $this->element('admin/pagination'); ?>
<?php else : ?>
	<center>
		<font color="red">
			No <?= $plural ?> existed!
		</font>
	</center>
<?php endif; ?>   