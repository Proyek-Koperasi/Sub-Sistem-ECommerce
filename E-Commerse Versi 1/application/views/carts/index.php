<section class="header_text sub">
    <img class="pageBanner" src="<?php echo base_url(); ?>assets/home/themes/images/pgBanner.png" alt="New products" >
    <h4><span>Keranjang</span></h4>
</section>
<section id="cart_items">
    <div class="row">
        <?php if ($this->cart->contents()): ?>
        <?php echo form_open('keranjang/update'); ?>
            <div class="span9"> 
                <table class="table table-striped">
                    <thead>
                        <tr class="cart_menu">
                            <td class="image">Gambar</td>
                            <td class="description">Nama</td>
                            <td class="price">Harga</td>
                            <td class="quantity">Quantity</td>
                            <td class="total">Total</td>
                            <td class="aktion">Action</td>
                            <td></td>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $i = 1; ?>
                        <?php foreach ($this->cart->contents() as $items): ?>
                        <?php echo form_hidden($i . '[rowid]', $items['rowid']); ?>
                        <tr>
                            <td class="cart_product">
                                <a href=""><img src="<?php echo base_url() ?>assets/uploads/files/<?php echo $items['gambar']; ?>" alt="" width="50px" height="35px"></a>
                            </td>
                            <td class="cart_description">
                                <h6><a href=""><?php echo $items['name']; ?></a></h6>
                            </td>
                            <td class="cart_price">
                                <?php echo number_format($items['price'],2,',','.'); ?>
                            </td>
                            <td class="cart_quantity">
                                <?php echo form_input(array('name' => $i . '[qty]', 'value' => $items['qty'], 'class' => 'input-mini')); ?>
                            </td>
                            <td class="cart_total">
                                <p class="cart_total_price"><?php echo number_format($items['subtotal'],2,',','.'); ?></p>
                            </td>
                            <td class="aktion">
                                <a href="<?php echo site_url('keranjang/delete/' . $items['rowid']); ?>" onclick="return confirm('Are you sure want to delete this?')">Delete</a>  
                            </td>
                        </tr>
                        <?php $i++; ?>
                        <?php endforeach; ?>
                        <tr>
                            <td>&nbsp;</td>
                            <td><h4>Total</h4></td>
                            <td>&nbsp;</td>
                            <td>&nbsp;</td>
                            <td><strong><?php echo number_format($this->cart->total(),2,',','.'); ?></strong></td>
                        </tr>   
                            
                    </tbody>
                </table>
                <p class="buttons center">
                    <button class="btn btn-primary" type="submit">Perbarui</button>
                    <a href="<?php echo site_url('product'); ?>" class="btn btn-primary">Lanjut Belanja</a>
                    <a href="<?php echo site_url('orders/checkout'); ?>" class="btn btn-primary pull-right">Checkout</a> 
                </p>
            </div>
            <?php else: ?>
          
                <div class="span12">
                    <h3>Keranjang Anda Kosong !</h3>
                </div>
                 <div class="span2">
                    <a href="<?php echo site_url('product'); ?>" class="btn btn-primary">&lt; Kembali Ke Produk</a>
                </div>
            
    </div>
    
        
        
              
        <?php endif; ?>    
   
</section>
    