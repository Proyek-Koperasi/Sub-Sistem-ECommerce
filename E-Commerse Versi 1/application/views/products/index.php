<section class="header_text sub">
    <img class="pageBanner" src="<?php echo base_url(); ?>assets/home/themes/images/pgBanner.png" alt="New products" >
    <h4><span>Produk</span></h4>
</section>
<section class="main-content">            
    <div class="row">                       
        <div class="span9">
            
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
            <?php if ($products): ?>
                <?php if ($this->input->get('q')): ?>
                Ditemukan <?php echo count($products); ?> produk dengan kata kunci '<strong><?php echo $this->input->get('q'); ?></strong>'. <br/><br/>
            
                <?php endif; ?>
                                 
            <ul class="thumbnails listing-products">
                <?php foreach ($products as $produk): ?>                                          
                <li class="span3">
                    <div class="product-box">
                        <span class="sale_tag"></span>
                        <p><a href=""><img src="<?php echo base_url() ?>assets/uploads/files/<?php echo $produk['gambar']; ?>" alt="" /></a></p>
                        <a href="<?php echo base_url() ?>product/detail/<?php echo $produk['permalink'] ?>" class="title"><?php echo $produk['nama'] ?></a><br/>
                        <p class="price">Rp. <?php echo number_format($produk['harga'],0,',','.') ?></p>
                    </div>
                </li>
                <?php endforeach; ?> 
            </ul>
                
        <?php endif; ?>
            <?php echo $pagination ?>
                            
        </div>
        <?php $this->load->view('widget/kategori'); ?>
    </div>

</section>