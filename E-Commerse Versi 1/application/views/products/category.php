<?php if ($products): ?>
<section class="header_text sub">
    <img class="pageBanner" src="<?php echo base_url(); ?>assets/home/themes/images/pgBanner.png" alt="New products" >
    <h4><span><?php echo $category['kategori']; ?></span></h4>
</section>
<section class="main-content">            
    <div class="row">         
        <div class="span9">
            <ul class="thumbnails listing-products">
                <?php foreach ($products as $product): ?>                                          
                <li class="span3">
                    <div class="product-box">
                        <span class="sale_tag"></span>
                        <p><a href=""><img src="<?php echo base_url() ?>assets/uploads/files/<?php echo $product['gambar']; ?>" alt="" /></a></p>
                        <a href="<?php echo base_url() ?>product/detail/<?php echo $product['permalink'] ?>" class="title"><?php echo $product['nama'] ?></a><br/>
                        <p class="price">Rp. <?php echo number_format($product['harga'],0,',','.') ?></p>
                    </div>
                </li>
                <?php endforeach; ?> 
            </ul>
            <?php endif; ?>
            <?php echo $pagination;?>

        </div>
        <?php $this->load->view('widget/kategori'); ?>
    </div>

</section>