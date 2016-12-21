<div id="top-bar" class="container">
    <div class="row">
        <div class="span4">
            <form method="get" class="search_form" action="<?php echo site_url('product'); ?>">
                <input class="input-block-level search-query" Placeholder="Cari Produk" name="q" type="text">

            </form>
        </div>
        <div class="span8">
            <div class="account pull-right">
                <ul class="user-menu">
                  <?php if (!$this->session->userdata('level') == 1) : ?>             
                    <li><a href="<?php echo site_url('users/beranda'); ?>">Akun Saya</a></li>
                    <li><a href="<?php echo site_url('keinginan'); ?>">Keinginan</a></li>
                    <li><a href="<?php echo site_url('keranjang'); ?>">Keranjang (<a href="<?php echo site_url('keranjang'); ?>"><?php echo number_format($this->cart->total_items())?>) </a></a></li>
                    <li><a href="<?php echo site_url('orders/checkout'); ?>">Checkout</a></li>
                    <li><a href="<?php echo site_url('orders/cara_belanja'); ?>">Cara Belanja</a></li>
                    <?php if ($this->session->userdata('id')): ?>                  
                    <li><a href="<?php echo site_url('users/logout'); ?>">Logout</a></li>
                    <?php else: ?>                       
                    <li><a href="<?php echo site_url('users/login'); ?>">Login</a></li>
                    <?php endif; ?> 
                 <?php else: ?> 
                    <li><a href="<?php echo site_url('admin/users/profile'); ?>">Akun Saya</a></li>
                    <li><a href="<?php echo site_url('admin/dashboard'); ?>">Dahboard</a></li>
                    <li><a href="<?php echo site_url('users/logout'); ?>">Logout</a></li>
                 <?php endif; ?>
                </ul>
            </div>
        </div>
    </div>
</div>
<div id="wrapper" class="container">
    <section class="navbar main-menu">
        <div class="navbar-inner main-menu">                
<!--            <a href="<?php echo base_url() ?>" class="logo pull-left"><img src="<?php echo base_url() ?>assets/uploads/foto/logoshop.png" class="site_logo" alt=""></a>-->
			<a href="<?php echo base_url() ?>" class="logo pull-left"><img src="<?php echo base_url() ?>assets/uploads/foto/home.png" alt="" class="site_logo"></a>
            <nav id="menu" class="pull-right">
            
            <ul>
                                        
                <li><a href="./products.html">Best Seller</a></li>
                <li><a href="<?php echo site_url('contactus'); ?>">Contact Me</a></li>
                <li><a href="<?php echo base_url() ?>pages/tentangkami">Tentang Kami</a></li>                  
            </ul>
            </nav>
        </div>
    </section>
