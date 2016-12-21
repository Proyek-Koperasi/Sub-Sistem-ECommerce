
<div id="side_menu">
    
    <div class="row">
        <h6><a href="#" id="menu-toggle2">Produk</a></h6>
        <div id="menu_list2">
            <ul>
                <li><a href="<?php echo base_url(); ?>admin/produk/add">Produk Baru</a></li>
                <li><a href="<?php echo base_url(); ?>admin/produk">Produk</a></li>
                <li><a href="<?php echo base_url(); ?>admin/categories/add">Kategori Baru</a></li>
                <li><a href="<?php echo base_url(); ?>admin/categories">Kategori</a></li>
            </ul>
        </div>
    </div> <!--end .row-->

    <div class="row">
        <h6><a id="menu-toggle8" href="#">Order</a></h6>
        <div id="menu_list8">
            <ul>
                <li><a href="<?php echo base_url(); ?>admin/orders">Order</a></li>
            </ul>
        </div>
    </div> 

    <!--    end .row-->

    <div class="row">
        <h6><a id="menu-toggle10" href="#">Pengaturan</a></h6>
        <div id="menu_list10">
            <ul>
                <li><a href="<?php echo base_url() ?>admin/settings">Pengaturan Umum</a></li>
                <li><a href="<?php echo base_url() ?>admin/users/profile">Profil</a></li>
            </ul>
        </div>
    </div> <!--end .row-->
    <div class="row">
        <h6><a class="no_sub" href="<?php echo site_url('admin/users'); ?>">Users</a></h6>
    </div> <!--end .row-->
    <div class="row">
        <h6><a class="no_sub" href="<?php echo site_url('users/logout'); ?>">Logout</a></h6>
    </div> <!--end .row-->

</div>     
