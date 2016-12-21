<section class="header_text sub">
    <img class="pageBanner" src="<?php echo base_url(); ?>assets/home/themes/images/pgBanner.png" alt="New products" >
    <h4><span>Login</span></h4>
</section>          
<section class="main-content">              
    <div class="row">
        <div class="span5">                 
            <h4 class="title"><span class="text">Form<strong>Login</strong></span></h4>
                <p>Jika Anda Mempunyai Akun Silahkan Login!</p>
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

                    <?php echo form_open('users/login'); ?>
                <fieldset>
                    <div class="control-group">
                        <label for="focusedInput" class="control-label">Email</label>
                        <div class="controls">
                            <input type="text" name="email" value="<?php echo set_value('email') ?>" placeholder="Email" id="username" class="input-xlarge focused">
                        </div>
                    </div>
                    <div class="control-group">
                        <label class="control-label">Password</label>
                        <div class="controls">
                            <input type="password" name="password" placeholder="Password Anda" id="password" class="input-xlarge">
                        </div>
                    </div>
                    <?php echo anchor('users/register', 'Daftar') ?> | 
                    <?php echo anchor('users/forgot_password', ' Lupa Password ?'); ?>
                    <button class="btn btn-inverse large" type="submit">Login</button>
                </fieldset>
                    <?php echo form_close(); ?>   
        </div>
        <div class="span7">                 
                        <h4 class="title"><span class="text"><strong>Register</strong> Form</span></h4>
                        <form action="#" method="post" class="form-stacked">
                            <fieldset>
                                                                   
                                <div class="control-group">
                                    <p>Jika Anda Belum Terdaftar Silahkan Daftar!!!</p>
                                </div>
                                <hr>
                                 <a href="<?php echo site_url('users/register'); ?>" class="btn btn-inverse large">Klik Untuk Daftar</a></div>
                            </fieldset>
                        </form>                 
                    </div>  
        
</section>






