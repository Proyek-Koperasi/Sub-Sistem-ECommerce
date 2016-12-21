<script type="text/javascript">
    $(document).ready(function() {
        $('#menu_list2').show();
    });
</script>
<div id="article">
    <h2 class="page_title">Ubah Brands</h2>
    <div class="inner_1"><div class="inner_2"><div class="inner_3"><div class="inner_4 clearfix">


                    <div class="row addedit_content">
                        <?php echo form_open_multipart('admin/categories/edit_brands'); ?>     
                        <?php echo form_hidden('id', $category_brands['id']) ?>
                        <fieldset>
                            <div class="row form clearfix">
                                <div class="label"><span class="required_mark">*</span><label for="post_ttl">Nama</label></div>
                                <div class="input full">
                                    <div class="input text required">
                                        <?php echo form_input(array('name' => 'nama', 'value' => set_value('nama', isset($category_brands['nama']) ? $category_brands['nama'] : ''))); ?>
                                        <div class="error-message"><?php echo form_error('nama'); ?></div>
                                    </div>
                                </div>
                            </div>
                            <div class="row form clearfix">
                                <div class="label"><label for="post_ttl">Deskripsi</label></div>
                                <div class="input full">
                                    <div class="input textarea required">
                                        <?php echo form_textarea(array('name' => 'deskripsi', 'value' => set_value('deskripsi', isset($category_brands['deskripsi']) ? $category['description'] : ''))); ?>
                                        <div class="error-message"><?php echo form_error('deskripsi'); ?></div>
                                    </div>
                                </div>
                            </div>

                            <div class="row form clearfix">
                                <div class="label">&nbsp;</div>
                                <div class="input">
                                    <button class="green_bt">Save</button>

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
