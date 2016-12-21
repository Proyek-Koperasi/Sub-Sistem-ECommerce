<?php $this->load->view('widget/slide'); ?>
<section class="main-content">
    <div class="row">
        <div class="span9">                                                    
            <div class="row">
                
                <div class="span9"> 

                    <?php $products = $this->general->getNewProducts(9)?>
                    <?php if ($products): ?>
                    <h4 class="title">
                    <span class="pull-left"><span class="text"><span class="line">Feature <strong>Products</strong></span></span></span>
                    <span class="pull-right">
                    
                    </span>
                    </h4>
                    
                            <ul class="thumbnails">   
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
                                         
                    </div>
                       
           
        <?php endif; ?>
       

        </div>            
       
        <div class="row">
                            <div class="span12">
                                <h4 class="title">
                                    <?php $produk ?>
                                            <?php if ($produk): ?>
                                    <span class="pull-left"><span class="text"><span class="line"><strong>Produk</strong>Terbaru</span></span></span>
                                    <span class="pull-right">
                                        <a class="left button" href="#myCarousel-2" data-slide="prev"></a><a class="right button" href="#myCarousel-2" data-slide="next"></a>
                                    </span>
                                </h4>
                                <div id="myCarousel-2" class="myCarousel carousel slide">
                                    <div class="carousel-inner">
                                        <div class="active item">
                                             
                                            <ul class="thumbnails"> 
                                            <?php foreach ($produk as $product): ?>                                              
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
                                             <?php endif; ?>
                                        </div>
                                        <div class="item">
                                            
                                            <?php if ($produks): ?>
                                            <ul class="thumbnails"> 
                                            <?php foreach ($produks as $product): ?>                                              
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
                                             <?php endif; ?>
                                        </div>
                                    </div>                          
                                </div>
                            </div>                      
                        </div>


    </div>
    <span class="pull-right">
        <span class="line">&nbsp;</span>
                    
    </span>
     <?php $this->load->view('widget/kategori'); ?>
    
</section>
 