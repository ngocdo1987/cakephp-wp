<?php ?>
<div class="col-lg-12 col-sm-12 col-md-12">
	<center>
	    <ul id="pagination" class="pagination">
	      <?php echo $this->Paginator->prev('<<') ?>
	      <?php echo $this->Paginator->numbers() ?>
	      <?php echo $this->Paginator->next('>>') ?>
	    </ul>
    </center>
</div>