<?php ?>
<div class="row">
	<div class="col-lg-9">
		<?php if(!empty($config)) : ?>
			<?= $this->Form->create($crud, ['id' => 'form']) ?>
				<?php foreach($config->cols as $k => $v) : ?>
					<div class="form-group row">
						<div class="col-lg-12">
							<?= $v->label ?>: <br/>
							<?php 
								switch($v->type) {
									case 'text':
										echo $this->Form->text($k, ['class' => 'form-control']);
										break;
									case 'textarea':
										echo $this->Form->textarea($k, ['class' => 'form-control']);
										break;	
									case 'ckeditor':
										echo $this->Form->textarea($k, ['class' => 'form-control', 'id' => 'ckeditor']);
										break;	
									case 'tinymce':
										echo $this->Form->textarea($k, ['class' => 'form-control', 'id' => 'tinymce']);
										break;
									case 'select':
										echo $this->Form->select($k, $v->value, ['class' => 'form-control select2']);
										break;
									case 'select_recursive':
									
										break;
									case 'select_multiple':
										echo $this->Form->select($k, $v->value, ['class' => 'form-control select2', 'multiple' => 'multiple']);
										break;				
									case 'radio':
										echo $this->Form->radio($k, []);
										break;	
									case 'checkbox':
										
										break;
									case 'file':
										echo $this->Form->file($k, ['class' => 'form-control']);
										break;
									case 'image':
										echo $this->Form->file($k, ['class' => 'form-control image_upload']);
										?>
										<br/>
										<img class="image_upload_preview" src="http://placehold.it/100x100" alt="your image" width="150" />
										<?php
										break;		
									case 'date':
									
										break;
									case 'datetime':
									
										break;
									case 'true_false':
										?>
										<label class="switch">
										 	<input type="checkbox" name="<?= $k ?>" checked>
										 	<div class="slider round"></div>
										</label>
										<?php
										break;				
								}
							?>
						</div>
					</div>	
				<?php endforeach; ?>

				<div class="form-group row">
					<div class="col-lg-12">
						<?= $this->Form->button('SAVE', ['class' => 'btn btn-primary']) ?> 
						<?= $this->Html->link('BACK', ['action' => 'index'], ['class' => 'btn btn-primary']) ?> 
					</div>
				</div>

			<?= $this->Form->end() ?>
		<?php else : ?>
			<center>
	    		<font color="red">
	    			Please create config file!
	    		</font>
	    	</center>	
		<?php endif; ?>
	</div>
</div>	