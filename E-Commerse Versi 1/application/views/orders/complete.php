<section class="main-content">
	<div class="row">
		<div class="span12">	
    		<div class="page-header">
        		<h1>Order Complete</h1>
   			 </div>
              <?php if ($this->session->flashdata('success')): ?>
                        <div  class="alert alert-success">
                            <?php echo $this->session->flashdata('success'); ?>
                        </div>
                    <?php endif; ?>

                    <?php if ($this->session->flashdata('error')): ?>
                        <div  class="alert alert-error">
                            <?php echo $this->session->flashdata('error'); ?>
                        </div>
                    <?php endif; ?>
    			<?php if ($this->session->flashdata('message')): ?>
        		<?php echo $this->session->flashdata('message'); ?>
    			<?php endif ?>
    			<br/>
    			<a href="<?php echo base_url() ?>" class="btn btn-primary">Back to home</a>
		</div>
	</div>
</section>
