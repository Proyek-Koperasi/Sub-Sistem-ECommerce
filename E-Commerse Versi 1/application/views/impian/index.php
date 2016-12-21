<section class="header_text sub">
    <img class="pageBanner" src="<?php echo base_url(); ?>assets/home/themes/images/pgBanner.png" alt="New products" >
    <h4><span>Keinginan</span></h4>
</section>
<section id="cart_items">
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
                    <?php if (!empty($wish)): ?>
                <table class="table table-striped">
                    <thead>
                        <tr class="cart_menu">
                            <td class="no">No</td>
                            <td class="image">Gambar</td>
                            <td class="description">Nama</td>
                            <td class="price">Harga</td>
                            <td class="total">Ketersediaan</td>
                            <td class="aktion">Action</td>
                            <td></td>
                        </tr>
                    </thead>
                    <tbody>
                        
                        <?php $i = 1; ?>
                        <?php foreach ($wish as $wish): ?>
                        <?php $id = $wish['id_produk']; ?>
                            <?php $id = $wish['id_produk']; ?>
                            <?php $items =  $this->general->getProductsById($id)?>
                            <?php if ($items): ?>
                                
                                <tr>
                                    <td class="cart_no">
                                        <?php echo $i; ?>
                                    </td>
                                    <td class="cart_product">
                                        <a href=""><img src="<?php echo base_url() ?>assets/uploads/files/<?php echo $items['gambar']; ?>" alt="" width="50px" height="35px"></a>
                                    </td>
                                    <td class="cart_description">
                                        <h6><a href="<?php echo base_url() ?>product/detail/<?php echo $items['permalink'] ?>"><?php echo $items['nama']; ?></a></h6>
                                    </td>
                                    <td class="cart_price">
                                        <?php echo number_format($items['harga'],2,',','.'); ?>
                                    </td>
                                    <td>
                                        <?php if ($items['jumlah']>0): ?>
                                        <h6>Tersedia</a></h6>
                                        <?php endif; ?>
                                    </td>
                                    <td class="cart_description">
                                        <h6><a href="<?php echo base_url() ?>keinginan/hapus/<?php echo $items['id'] ?>">Hapus</a></h6>
                                    </td>
                                    
                                    
                                </tr>
                               
                            <?php endif; ?>
                         <?php $i++; ?>
                        <?php endforeach; ?>
                         
                    </tbody>
                </table>
                <?php else: ?>
                        <h6>Anda Tidak Mempunyai Keinginan</h6>
                        <?php endif; ?>
                <p class="buttons center">
                    <a href="<?php echo site_url('product'); ?>" class="btn btn-primary">Lanjut Belanja</a>
                </p>
            </div>
           
   
</section>
    