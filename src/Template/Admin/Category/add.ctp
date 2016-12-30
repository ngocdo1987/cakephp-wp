<?php
	$this->assign('title', 'Add category');
?>
<div class="row">
	<div class="col-lg-9">
		<?= $this->Form->create($category, ['id' => 'form']) ?>
			<div class="form-group row">
				<div class="col-lg-12">
					Name: <br/>
					<?= $this->Form->text('category_name', ['class' => 'form-control']); ?>
				</div>
			</div>
			<div class="form-group row">
				<div class="col-lg-12">
					Slug: <br/>
					<?= $this->Form->text('category_slug', ['class' => 'form-control']) ?>
				</div>
			</div>
			<div class="form-group row">
				<div class="col-lg-12">
					Description: <br/>
					<?= $this->Form->textarea('category_description', ['class' => 'form-control']) ?>
				</div>
			</div>
			<div class="form-group row">
				<div class="col-lg-12">
					Parent: <br/>
					<?= $this->Form->select('parent_id', [
						'1' => 'Publish',
						'0' => 'Draft' 
					], [
						'class' => 'form-control select2'
					]) ?>
				</div>
			</div>
			<div class="form-group row">
				<div class="col-lg-12">
					Meta title: <br/>
					<?= $this->Form->textarea('category_mt', ['class' => 'form-control']) ?>
				</div>
			</div>
			<div class="form-group row">
				<div class="col-lg-12">
					Meta description: <br/> 
					<?= $this->Form->textarea('category_md', ['class' => 'form-control']) ?>
				</div>
			</div>
			<div class="form-group row">
				<div class="col-lg-12">
					Meta keyword: <br/> 
					<?= $this->Form->textarea('category_mk', ['class' => 'form-control']) ?>
				</div>
			</div>
		<?= $this->Form->end() ?>
	</div>
</div>	