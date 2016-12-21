<section class="header_text sub">
    <img class="pageBanner" src="<?php echo base_url(); ?>assets/home/themes/images/pgBanner.png" alt="New products" >
        <h4><span>Product Detail</span></h4>
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
            <div class="row">
                <div class="span4">
                    <a href="<?php echo base_url() ?>assets/uploads/files/<?php echo $product['gambar']; ?>" class="thumbnail" data-fancybox-group="group1" title="Description 1"><img alt="" src="<?php echo base_url() ?>assets/uploads/files/<?php echo $product['gambar']; ?>"></a>          
                </div>
                <div class="span5">
                        <h2><strong><?php echo $product['nama'] ?><br/></strong></h2>
                    <address>
                        <strong>Brand:</strong> <span></span><br>
                        <strong>Kode Produk:</strong> <span><?php echo $product['sku'] ?></span><br>
                        <?php if ($product['jumlah'] <= 0): ?>
                        <strong>Ketersediaan:</strong> <span>Habis</span><br>
                        <?php else: ?>
                        <strong>Ketersediaan:</strong> <span>Tersedia</span><br>
                        <?php endif; ?>                                
                    </address>                                  
                    <h5><strong>Harga: Rp. <?php echo number_format($product['harga'],2,',','.') ?></strong></h5><span>Diskon : <?php echo $product['diskon'] ?>%</span><br>
                    <h3><strong>Harga Net: Rp. <?php echo number_format($product['harga_net'],2,',','.') ?></strong></h3>
					
             </div>
                <div class="span5">
                    <form class="form-inline">
                        <?php if (!$this->session->userdata('level') == 1) : ?>
                        <?php if ($product['jumlah'] > 0): ?>
                        <p>&nbsp;</p>
                            <a href="<?php echo site_url('product/add_cart/' . $product['permalink']); ?>" class="btn btn-primary">Tambah Ke Keranjang</a>
                            <a href="<?php echo site_url('product/add_keinginan/' . $product['id']); ?>" class="btn btn-primary">Tambah Ke Daftar Keinginan</a>
                        <?php else: ?>
                            <a href="<?php echo site_url('product/add_keinginan/' . $product['id']); ?>" class="btn btn-primary">Tambah Ke Daftar Keinginan</a>
                        <?php endif; ?>
                        <?php endif; ?>
                    </form>
                </div>                          
            </div>
            <div class="row">
                <div class="span9">
                     <ul class="nav nav-tabs">
                        <li class="active"><a href="#1" data-toggle="tab">Dekripsi</a></li>
                        <li><a href="#2" data-toggle="tab">Produk Terkait</a></li>
                        <li><a href="#3" data-toggle="tab">Reviews</a></li>
                    </ul>
                <div class="tab-content">
                    <div class="tab-pane active" id="1">
                        <?php echo $product['deskripsi'] ?>
                    </div>
                    <div class="tab-pane" id="2">
                            <?php $relatedprod = $this->general->getProductsByCategoryId($product['kategori']) ?>
                            <?php if ($relatedprod): ?>
                            
                            <h4 class="title">
                                    <span class="pull-left"><span class="text"><strong>Produk</strong> Terkait</span></span>
                                    
                                </h4>
                                <div id="myCarousel-1" class="carousel slide">
                                    <div class="carousel-inner">
                                        <div class="active item">
                                            
                                            <ul class="thumbnails listing-products">
                                            <?php foreach ($relatedprod as $product): ?>
                                                <li class="span2">
                                                    <div class="product-box">
                                                        <span class="sale_tag"></span>
                                                        <p><a href=""><img src="<?php echo base_url() ?>assets/uploads/files/<?php echo $product['gambar']; ?>" alt="" /></a></p>
                                                        <a href="<?php echo base_url() ?>product/detail/<?php echo $product['permalink'] ?>" class="title"><?php echo $product['nama'] ?></a><br/>
                                                        <p class="price">Rp. <?php echo number_format($product['harga'],0,',','.') ?></p>
                                                    </div>
                                                </li>
                                            <?php endforeach; ?>
                                            </ul>

                                        </div>
                                    </div>
                                </div>      
                                
                                <?php endif; ?>
                    </div>
                    <div class="tab-pane" id="3">
                        <div class="fb-comments" data-href="http://giestore.com/<?php echo $product['permalink'] ?>" data-order-by="reverse_time" data-width="850" data-numposts="5" data-colorscheme="light"></div>

                    </div>
                </div>
            </div>
        </div>
    </div>
     <?php $this->load->view('widget/kategori'); ?>
</section>



