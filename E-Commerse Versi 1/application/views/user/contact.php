<section class="header_text sub">
    <img class="pageBanner" src="<?php echo base_url(); ?>assets/home/themes/images/pgBanner.png" alt="New products" >
    <h4><span>Curhatan Anda</span></h4>
</section> 
<section class="main-content">              
                <div class="row">               
                    <div class="span5">
                        <div>
                            <h5>E-Koperasi Informasi</h5>
                            <p><strong>No Telp:</strong><br/>
                            <strong>&nbsp;&nbsp;- Deddy Kusbianto</strong>&nbsp;&nbsp;(0856)-4664-2835<br>
                            <strong>&nbsp;&nbsp;- M. Azzam Azizi</strong>&nbsp;&nbsp;(0856)-5590-9004<br>
                            <strong>Email:</strong>&nbsp;<a href="#">admin@koperasi.com</a><br>                             
                            <strong>Alamat:</strong>&nbsp;Jl. Soekarno Hatta 09 Malang 65144
                            </p>
                        </div>
                    </div>
                    <div class="span7">
                    <?php echo form_open('contactus/kirim') ?>
                    <fieldset>
                        <?php if ($this->session->flashdata('message')): ?>
                        <?php echo $this->session->flashdata('message'); ?>
                        <?php endif ?>
                        <?php if (validation_errors()): ?>
                        <div  class="alert alert-error">
                            <?php echo validation_errors(); ?>
                        </div>
                        <?php endif; ?>
                        <p>Anda dapat bertanya seputar e-koperasi ini Kepada Kami dengan Mengisi Form Dibawah Ini</p>
                                <div class="clearfix">
                                    <label for="nama"><span>Nama:</span></label>
                                    <div class="input">
                                        <input tabindex="1" size="18" value="<?php echo set_value('nama') ?>" name="nama" type="text" value="" class="input-xlarge" placeholder="Nama">
                                    </div>
                                </div>
                                
                                <div class="clearfix">
                                    <label for="email"><span>Email:</span></label>
                                    <div class="input">
                                        <input tabindex="2" size="25" value="<?php echo set_value('email') ?>" name="email" type="text" value="" class="input-xlarge" placeholder="Email">
                                    </div>
                                </div>
                                
                                <div class="clearfix">
                                    <label for="pesan"><span>Pesan Anda:</span></label>
                                    <div class="input">
                                        <textarea tabindex="3" class="input-xlarge" value="<?php echo set_value('pesan') ?>" name="pesan" rows="7" placeholder="Sampaikan Isi Hati Anda Disini"></textarea>
                                    </div>
                                </div>
                                
                                <div class="actions">
                                    <button tabindex="3" type="submit" class="btn btn-inverse">Kirim Pesan</button>
                                </div>
                            </fieldset>
                        <?php echo form_close(); ?>
                    </div>              
                </div>
            </section>  