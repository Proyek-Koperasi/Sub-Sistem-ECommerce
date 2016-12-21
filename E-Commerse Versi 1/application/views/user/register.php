<section class="header_text sub">
    <img class="pageBanner" src="<?php echo base_url(); ?>assets/home/themes/images/pgBanner.png" alt="New products" >
    <h4><span>Register</span></h4>
</section>          
<section class="main-content">              
  
        <div class="span7">                 
            <h4 class="title"><span class="text">Form<strong>Register</strong></span></h4>
            <?php echo form_open('users/register') ?>
            <fieldset>
                <?php if ($this->session->flashdata('message')): ?>
                <?php echo $this->session->flashdata('message'); ?>
                <?php endif ?>
                <div class="control-group">
                    <label for="focusedInput" class="control-label">Nama Depan</label>
                    <div class="controls">
                        <input type="text" name="NamaDepan" value="<?php echo set_value('NamaDepan') ?>"  class="input-xlarge focused">
                    </div>
                </div>
                <div class="control-group">
                    <label for="focusedInput" class="control-label">Nama Belakang</label>
                    <div class="controls">
                        <input type="text" name="NamaBelakang" value="<?php echo set_value('NamaBelakang') ?>"   class="input-xlarge focused">
                    </div>
                </div>  
                <div class="control-group">
                    <label for="focusedInput" class="control-label">Email:</label>
                    <div class="controls">
                        <input type="text" class="input-xlarge focused span6" name="email" value="<?php echo set_value('email'); ?>" />
                    </div>
                </div>
                <div class="control-group">
                    <label for="focusedInput" class="control-label">Password:</label>
                    <div class="controls">
                        <input type="password" class="input-xlarge focused span6" name="password" />
                    </div>
                </div>
                <div class="control-group">
                    <label for="focusedInput" class="control-label">Confirm Password:</label>
                    <div class="controls">
                        <input type="password" class="input-xlarge focused span6" name="repass" />
                    </div>
                </div>
                <div class="control-group">
                    <label for="focusedInput" class="control-label">Phone:</label>
                    <div class="controls">
                        <input type="text" class="input-xlarge focused span6" name="phone" value="<?php echo set_value('phone'); ?>" />
                    </div>
                </div>
                <div class="control-group">
                    <label for="focusedInput" class="control-label">Alamat:</label>
                    <div class="controls">
                        <textarea class="span6" name="alamat"><?php echo set_value('alamat'); ?></textarea>
                    </div>
                </div>
                <div class="control-group">
                    <label for="focusedInput" class="control-label">Zip:</label>
                    <div class="controls">
                        <input type="text" class="input-xlarge focused span6" name="zip" value="<?php echo set_value('zip'); ?>" />
                    </div>
                </div>
                <div class="span2">
                    <button class="btn btn-inverse large"  type="submit">Daftar</button>
                </div>      
            </fieldset>
            <?php echo form_close(); ?>      
        </div>     
        <div class="row">
        <div class="span4">                 
            <h4 class="title"><span class="text"><strong></strong> </span></h4>
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
                    <?php if (validation_errors()): ?>
                        <div  class="alert alert-error">
                            <?php echo validation_errors(); ?>
                        </div>
                    <?php endif; ?>
                     <?php if ($this->session->flashdata('message')): ?>
            <?php echo $this->session->flashdata('message'); ?>
        <?php endif ?>
                          
    </div>
                     
        </div>
</section>  

