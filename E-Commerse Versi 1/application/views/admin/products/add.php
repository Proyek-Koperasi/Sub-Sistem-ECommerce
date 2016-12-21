
<script type="text/javascript">
    $(document).ready(function() {
        $('#menu_list2').show();
    });
</script>
<?php echo initialize_tinymce() ?>
<div id="article">
    <h2 class="page_title">Create Product</h2>
    <div class="inner_1"><div class="inner_2"><div class="inner_3"><div class="inner_4 clearfix">


                    <div class="row addedit_content">

                        <?php echo form_open_multipart('admin/produk/add') ?>

                        <fieldset>
                            <div class="row form clearfix">
                                <div class="label"><span class="required_mark">*</span><label for="post_ttl">Kode</label></div>

                                <div class="input full">
                                    <div class="input select">
                                        <?php echo form_input(array('name' => 'code', 'value' => set_value('code'), 'class' => 'field size1')); ?>
                                        <div class="error-message"><?php echo form_error('code'); ?></div>
                                    </div>
                                </div>
                            </div>		

                            <div class="row form clearfix">
                                <div class="label"><span class="required_mark">*</span><label for="post_ttl">Nama</label></div>

                                <div class="input full">
                                    <div class="input select">
                                        <?php echo form_input(array('name' => 'name', 'value' => set_value('name'), 'class' => 'field size1')); ?>
                                        <div class="error-message"><?php echo form_error('name'); ?></div>
                                    </div>
                                </div>
                            </div>	
                            <div class="row form clearfix">
                                <div class="label"><span class="required_mark">*</span><label for="post_ttl">harga</label></div>

                                <div class="input full">
                                    <div class="input select">
                                        <?php echo form_input(array('name' => 'price', 'value' => set_value('price'), 'class' => 'field size1')); ?>
                                        <div class="error-message"><?php echo form_error('price'); ?></div>
                                    </div>
                                </div>
                            </div>	
                            <div class="row form clearfix">
                                <div class="label"><label for="post_ttl">Diskon</label></div>

                                <div class="input full">
                                    <div class="input select">
                                        <?php echo form_input(array('name' => 'discount_percent', 'value' => set_value('discount_percent'), 'class' => 'field size1')); ?>
                                        <div class="error-message"><?php echo form_error('discount_percent'); ?></div>
                                    </div>
                                </div>
                            </div>		

                            <div class="row form clearfix">
                                <div class="label"><span class="required_mark">*</span><label for="post_ttl">Stock</label></div>

                                <div class="input full">
                                    <div class="input select">

                                        <?php echo form_input(array('name' => 'stock', 'value' => set_value('stock'), 'class' => 'field size1')); ?>
                                        <div class="error-message"><?php echo form_error('stock'); ?></div>
                                    </div>
                                </div>
                            </div>		

                            <div class="row form clearfix">
                                <div class="label"><label for="post_ttl">Deskripsi</label></div>

                                <div class="input full">
                                    <div class="input select">
                                        <?php echo form_textarea(array('name' => 'description', 'value' => set_value('description'), 'cols' => 50, 'class' => 'field size1')); ?>
                                        <div class="error-message"><?php echo form_error('description'); ?></div>
                                    </div>
                                </div>
                            </div>	
                            <div class="row form clearfix">
                                <div class="label"><label for="post_ttl">Gambar</label></div>

                                <div class="input full">
                                    <div class="input select">
                                        <?php echo form_upload('image'); ?>
                                        <div class="error-message"><?php echo form_error('image'); ?></div>
                                    </div>
                                </div>
                            </div>
                            <div class="row form clearfix">
                                <div class="label"><span class="required_mark">*</span><label for="post_ttl">Brands</label></div>

                                <div class="input full">
                                    <div class="input select">
                                        <?php echo form_dropdown('kategori_brands', $categories_brands); ?>
                                        <div class="error-message"><?php echo form_error('kategori_brands'); ?></div>
                                    </div>
                                </div>
                            </div>
                            <div class="row form clearfix">
                                <div class="label"><span class="required_mark">*</span><label for="post_ttl">Gender</label></div>

                                <div class="input full">
                                    <div id="gender">
                                        <?php echo form_dropdown('kategori_gender', $categories_gender,'','id="kategori_gender"'); ?>
                                        <div class="error-message"><?php echo form_error('kategori_gender'); ?></div>
                                    </div>
                                </div>
                            </div>
                            <script type="text/javascript">
                            $("#kategori_gender").change(function(){
                                    var kategori_gender = {kategori_gender:$("kategori_gender").val()};
                                    $.ajax({
                                            type: "POST",
                                            url : "<?php echo site_url('admin/produk/select_kategori')?>",
                                            data: kategori_gender,
                                            success: function(msg){
                                                $('#kategori').html(msg);
                                            }
                                        });
                            });
                           </script>

                            <div class="row form clearfix">
                                <div class="label"><span class="required_mark">*</span><label for="post_ttl">Kategori</label></div>

                                <div class="input full">
                                    <div id="kategori">
                                          <?php echo form_dropdown("kategori_id",array('Pilih kategori'=>'Pilih Gender Dulu'),'','disabled'); ?>
                                    </div>
                                </div>
                            </div>
                            

                            <div class="row form clearfix">
                                <div class="label"><span class="required_mark">*</span><label for="post_ttl">Status</label></div>

                                <div class="input full">
                                    <div class="input select">
                                        <?php echo form_dropdown('status', $status); ?>
                                        <div class="error-message"><?php echo form_error('status'); ?></div>
                                    </div>
                                </div>
                            </div>

                            <div class="row form clearfix">
                                <div class="label">&nbsp;</div>
                                <div class="input">
                                    <button class="green_bt">Simpan</button>

                                </div>
                            </div>
                        </fieldset>
                        <?php echo form_close(); ?>

                    </div>
                    <div id="result"></div>
                </div></div></div>
    </div>
</div>

<!--end #article-->